<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Subsoal_model extends MY_Model
{

    public function loadSubSoal()
    {
        $this->datatables->select("id_sub, nama_sub, tgl_pembuatan, catatan, tipe_soal,
        (select count(id_item) from item_soal where a.id_sub = id_sub AND (item = 'soal' OR item = 'soal berbobot')) as soal
        ");
        $this->datatables->from("sub_soal as a");
        $this->datatables->where("hapus", 0);
        $this->datatables->add_column('action', '
                <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                        ' . tablerIcon("menu-2", "me-1") . '
                        Menu
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item editSubSoal" href="#editSubSoal" data-bs-toggle="modal" data-id="$1">
                            ' . tablerIcon("info-circle", "me-1") . '
                            Detail Sub Soal
                        </a>
                        <a class="dropdown-item" href="' . base_url() . 'subsoal/edit/$2" target="_blank">
                            ' . tablerIcon("files", "me-1") . '
                            Input Soal
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item hapusSubSoal" href="javascript:void(0)" data-id="$1">
                            ' . tablerIcon("trash", "me-1") . '
                            Hapus
                        </a>
                    </div>
                </span>', 'id_sub, md5(id_sub)');

        $this->datatables->edit_column("tgl_pembuatan", '$1', 'tgl_indo(tgl_pembuatan, lengkap)');
        return $this->datatables->generate();
    }

    public function add_subsoal()
    {
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $query = $this->add_data("sub_soal", $data);
        if ($query) return 1;
        else return 0;
    }

    public function get_subsoal()
    {
        $id_sub = $this->input->post("id_sub");

        $data = $this->get_one("sub_soal", ["id_sub" => $id_sub]);
        return $data;
    }

    public function update_subsoal()
    {
        $id_sub = $this->input->post("id_sub");
        unset($_POST['id_sub']);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $query = $this->edit_data("sub_soal", ["id_sub" => $id_sub], $data);
        if ($query) return 1;
        else return 0;
    }

    public function delete_subsoal()
    {
        $id_sub = $this->input->post("id_sub");

        $data = $this->Main_model->edit_data("sub_soal", ["id_sub" => $id_sub], ["hapus" => 1]);
        if ($data) return 1;
        else return 0;
    }

    public function add_item_soal()
    {
        $id_sub = $this->input->post("id_sub");
        $soal = $this->Main_model->get_one("sub_soal", ["md5(id_sub)" => $id_sub]);

        $item = $this->Main_model->get_one("item_soal", ["md5(id_sub)" => $id_sub], "urutan", "DESC");
        if ($item) {
            $urutan = $item['urutan'] + 1;
        } else {
            $urutan = 1;
        }

        if ($_POST['item'] == "gambar" || $_POST['item'] == "audio") {
            $data = [
                "id_sub" => $soal['id_sub'],
                "item" => $this->input->post("item"),
                "data" => "media",
                "penulisan" => "LTR",
                "urutan" => $urutan
            ];

            $query = $this->Main_model->add_data("item_soal", $data);

            $this->upload_media($query, $_FILES, $_POST['item']);

            if ($query) {
                return 1;
            } else {
                return 0;
            }
        } else {
            if ($_POST['item'] == "petunjuk") {
                $data = [
                    "id_sub" => $soal['id_sub'],
                    "item" => $this->input->post("item"),
                    "data" => trim($this->input->post("data_soal")),
                    "penulisan" => $this->input->post("penulisan"),
                    "urutan" => $urutan,
                    // "tampil" => $this->input->post("tampil"),
                    "waktu_soal" => $this->input->post("waktu_soal"),
                ];
            } else if ($_POST['item'] == 'soal berbobot') {
                $data = [
                    "id_sub" => $soal['id_sub'],
                    "item" => $this->input->post("item"),
                    "data" => trim($this->input->post("data_soal")),
                    "penulisan" => $this->input->post("penulisan"),
                    "urutan" => $urutan
                ];
            } else {
                $data = [
                    "id_sub" => $soal['id_sub'],
                    "item" => $this->input->post("item"),
                    "data" => trim($this->input->post("data_soal")),
                    "penulisan" => $this->input->post("penulisan"),
                    "urutan" => $urutan,
                    // "id_text" => $this->input->post("id_text"),
                    // "waktu_soal" => $this->input->post("waktu_soal"),
                ];
            }

            $query = $this->Main_model->add_data("item_soal", $data);
            if ($query) return 1;
            else return 0;
        }
    }

    public function get_all_item_soal()
    {
        $id_sub = $this->input->post("id_sub");

        $data = $this->Main_model->get_one("sub_soal", ["md5(id_sub)" => $id_sub]);

        $structure = $this->Main_model->get_all("item_soal", ["md5(id_sub)" => $id_sub], "urutan", "ASC");
        $data['item'] = [];

        $j = 1;
        foreach ($structure as $i => $soal) {
            if ($soal['item'] == "soal") {

                $string = trim(preg_replace('/\s+/', ' ', $soal['data']));
                $txt_soal = json_decode($string, true);

                if ($soal['penulisan'] == "RTL") {
                    $no = $this->Other_model->angka_arab($j) . ". ";
                    $tes['soal'] = str_replace("{no}", $no, $txt_soal['soal']);
                } else {
                    $no = $j . ". ";
                    $tes['soal'] = str_replace("{no}", $no, $txt_soal['soal']);
                }

                $data['item'][$i]['id_item'] = $soal['id_item'];
                $data['item'][$i]['item'] = $soal['item'];
                $data['item'][$i]['data']['soal'] = $tes['soal'];
                $data['item'][$i]['data']['pilihan'] = $txt_soal['pilihan'];
                $data['item'][$i]['data']['jawaban'] = $txt_soal['jawaban'];
                $data['item'][$i]['penulisan'] = $soal['penulisan'];
                $data['item'][$i]['waktu_soal'] = $soal['waktu_soal'];

                // pembahasan 
                if (isset($txt_soal['pembahasan_benar'])) {
                    $data['item'][$i]['pembahasan_benar'] = $txt_soal['pembahasan_benar'];
                } else {
                    $data['item'][$i]['pembahasan_benar'] = "";
                }

                if (isset($txt_soal['pembahasan_salah'])) {
                    $data['item'][$i]['pembahasan_salah'] = $txt_soal['pembahasan_salah'];
                } else {
                    $data['item'][$i]['pembahasan_salah'] = "";
                }

                $j++;
            } else if ($soal['item'] == "soal berbobot") {

                $string = trim(preg_replace('/\s+/', ' ', $soal['data']));
                $txt_soal = json_decode($string, true);

                if ($soal['penulisan'] == "RTL") {
                    $no = $this->Other_model->angka_arab($j) . ". ";
                    $tes['soal'] = str_replace("{no}", $no, $txt_soal['soal']);
                } else {
                    $no = $j . ". ";
                    $tes['soal'] = str_replace("{no}", $no, $txt_soal['soal']);
                }

                $data['item'][$i]['id_item'] = $soal['id_item'];
                $data['item'][$i]['item'] = $soal['item'];
                $data['item'][$i]['data']['soal'] = $tes['soal'];
                $data['item'][$i]['data']['pilihan'] = $txt_soal['pilihan'];
                $data['item'][$i]['data']['bobot'] = $txt_soal['bobot'];
                $data['item'][$i]['penulisan'] = $soal['penulisan'];
                $data['item'][$i]['waktu_soal'] = $soal['waktu_soal'];

                // pembahasan 
                if (isset($txt_soal['pembahasan_benar'])) {
                    $data['item'][$i]['pembahasan_benar'] = $txt_soal['pembahasan_benar'];
                } else {
                    $data['item'][$i]['pembahasan_benar'] = "";
                }

                if (isset($txt_soal['pembahasan_salah'])) {
                    $data['item'][$i]['pembahasan_salah'] = $txt_soal['pembahasan_salah'];
                } else {
                    $data['item'][$i]['pembahasan_salah'] = "";
                }

                $j++;
            } else if ($soal['item'] == "petunjuk" || $soal['item'] == "audio" || $soal['item'] == "gambar") {
                $data['item'][$i] = $soal;
                $data['item'][$i]['waktu_soal'] = $soal['waktu_soal'];
            }
        }

        return $data;
    }

    // tanpa pembahasan 
    // public function get_item_soal(){
    //     $id_item = $this->input->post("id_item");

    //     $item = $this->Main_model->get_one("item_soal", ["id_item" => $id_item]);

    //     if($item['item'] == "soal"){
    //         $data = $item;

    //         $string = trim(preg_replace('/\s+/', ' ', $item['data']));
    //         $item = json_decode($string, true );

    //         $data['soal'] = $item['soal'];
    //         $data['pilihan'] = $item['pilihan'];
    //         $data['jawaban'] = $item['jawaban'];
    //     } else if($item['item'] == "petunjuk" || $item['item'] == "audio"){
    //         $data = $item;
    //     }

    //     return $data;
    // }

    // pembahasan
    public function get_item_soal()
    {
        $id_item = $this->input->post("id_item");

        $item = $this->Main_model->get_one("item_soal", ["id_item" => $id_item]);

        if ($item['item'] == "soal") {
            $data = $item;

            $string = trim(preg_replace('/\s+/', ' ', $item['data']));
            $item = json_decode($string, true);

            $data['soal'] = $item['soal'];
            $data['pilihan'] = $item['pilihan'];
            $data['jawaban'] = $item['jawaban'];

            if (isset($item['pembahasan_benar'])) {
                $data['pembahasan_benar'] = $item['pembahasan_benar'];
            } else {
                $data['pembahasan_benar'] = "";
            }

            if (isset($item['pembahasan_salah'])) {
                $data['pembahasan_salah'] = $item['pembahasan_salah'];
            } else {
                $data['pembahasan_salah'] = "";
            }
        } else if ($item['item'] == "soal berbobot") {
            $data = $item;

            $string = trim(preg_replace('/\s+/', ' ', $item['data']));
            $item = json_decode($string, true);

            $data['soal'] = $item['soal'];
            $data['pilihan'] = $item['pilihan'];
            $data['bobot'] = $item['bobot'];
        } else if ($item['item'] == "petunjuk" || $item['item'] == "audio") {
            $data = $item;
        }

        return $data;
    }

    public function edit_item_soal()
    {
        $id_item = $this->input->post("id_item");

        $item = $this->get_one("item_soal", ["id_item" => $id_item]);

        if ($item['item'] == "soal") {
            $data = [
                "data" => $this->input->post("data_soal"),
                "penulisan" => $this->input->post("penulisan"),
                "id_text" => $this->input->post("id_text"),
                "waktu_soal" => $this->input->post("waktu_soal")
            ];
        } else if ($item['item'] == "soal berbobot") {
            $data = [
                "data" => $this->input->post("data_soal"),
                "penulisan" => $this->input->post("penulisan"),
                "id_text" => $this->input->post("id_text"),
                "waktu_soal" => $this->input->post("waktu_soal")
            ];
        } else if ($item['item'] == "petunjuk") {
            $data = [
                "data" => $this->input->post("data_soal"),
                "tampil" => $this->input->post("tampil"),
                "penulisan" => $this->input->post("penulisan"),
                "waktu_soal" => $this->input->post("waktu_soal")
            ];
        } else {
            $data = [
                "data" => $this->input->post("data_soal"),
                "penulisan" => $this->input->post("penulisan")
            ];
        }

        $query = $this->Main_model->edit_data("item_soal", ["id_item" => $id_item], $data);
        if ($query) return 1;
        else return 0;
    }

    public function edit_urutan_soal()
    {
        $id_item = $this->input->post("id_item");

        $i = 1;
        foreach ($id_item as $item) {
            $this->Main_model->edit_data("item_soal", ["id_item" => $item], ["urutan" => $i]);
            $i++;
        }

        return 1;
    }

    public function hapus_item_soal()
    {
        $id_item = $this->input->post("id_item");

        $item = $this->Main_model->get_one("item_soal", ["id_item" => $id_item]);

        if ($item['item'] == "audio") {
            unlink('./assets/myaudio/' . $item['data']);
        }

        if ($item['item'] == "gambar") {
            unlink('./assets/myimg/' . $item['data']);
        }

        $id_sub = $item['id_sub'];
        $urutan = $item['urutan'];

        $all_item = $this->Main_model->get_all("item_soal", ["id_sub" => $id_sub, "urutan > ", $urutan]);
        foreach ($all_item as $item) {
            $urutan = $item['urutan'] - 1;
            $this->Main_model->edit_data("item_soal", ["id_item" => $item['id_item']], ["urutan" => $urutan]);
        }

        $data = $this->Main_model->delete_data("item_soal", ["id_item" => $id_item]);
        if ($data) return 1;
        else return 0;
    }

    public function upload_media($id, $file, $tipe)
    {
        if (isset($file['file']['name'])) {

            $nama_file = $_FILES['file']['name']; // Nama Audio
            $size        = $_FILES['file']['size']; // Size Audio
            $error       = $_FILES['file']['error'];
            $tipe_audio  = $_FILES['file']['type']; //tipe audio untuk filter
            if ($tipe == "audio") $folder      = "./assets/myaudio/";
            else if ($tipe == "gambar") $folder      = "./assets/myimg/";
            $valid       = array('jpg', 'png', 'gif', 'jpeg', 'JPG', 'PNG', 'GIF', 'JPEG', 'mp3', 'MP3');

            if (strlen($nama_file)) {
                // Perintah untuk mengecek format gambar

                list($txt, $ext) = explode(".", $nama_file);
                if (in_array($ext, $valid)) {

                    // Perintah untuk mengupload file dan memberi nama baru
                    switch ($tipe_audio) {
                        case 'image/jpeg':
                            $tipe_audio = "jpg";
                            break;
                        case 'image/png':
                            $tipe_audio = "png";
                            break;
                        case 'image/gif':
                            $tipe_audio = "gif";
                            break;
                        case 'audio/mpeg':
                            $tipe_audio = "mp3";
                            break;
                        default:
                            break;
                    }

                    $namaFile = $id . "." . $tipe_audio;

                    $tmp = $file['file']['tmp_name'];


                    if (move_uploaded_file($tmp, $folder . $namaFile)) {

                        $this->edit_data("item_soal", ["id_item" => $id], ["data" => $namaFile]);

                        return 1;
                    } else { // Jika Audio Gagal Di upload 
                        return 0;
                    }
                } else {
                    return 2;
                }
            }
        }
    }

    public function get_text_reading()
    {
        $id_sub = $this->input->post("id_sub");

        $data = $this->get_all("item_soal", ["md5(id_sub)" => $id_sub, "item" => "petunjuk", "tampil" => "Tidak"]);
        return $data;
    }
}

/* End of file Subsoal.php */
