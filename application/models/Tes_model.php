<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tes_model extends MY_Model
{

    public function loadTes()
    {
        $config = $this->config();

        $this->datatables->select("id_tes, tipe_tes, tgl_tes, tgl_pengumuman, nama_tes, a.status, nama_soal, a.catatan, password,
            (select count(id) from peserta where a.id_tes = id_tes) as peserta_latihan,
            (select count(id) from peserta_toefl where a.id_tes = id_tes) as peserta_toefl, a.id_soal
        ");
        $this->datatables->from("tes as a");
        $this->datatables->join("soal as b", "a.id_soal = b.id_soal");
        $this->datatables->where("a.hapus", 0);

        $this->datatables->add_column("sertifikat", '$1', 'jum_sertifikat(id_tes)');
        $this->datatables->add_column("soal", '$1', 'jum_soal(id_soal)');
        $this->datatables->add_column("peserta", '$1', 'peserta(peserta_latihan, peserta_toefl)');
        $this->datatables->add_column('action', '
                <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                        ' . tablerIcon("menu-2", "me-1") . '
                        Menu
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item editTes" href="#editTes" data-bs-toggle="modal" data-id="$1">
                            ' . tablerIcon("info-circle", "me-1") . '
                            Detail Tes
                        </a>
                        <a class="dropdown-item" href="' . base_url() . 'tes/hasil/$2" target="_blank">
                            ' . tablerIcon("award", "me-1") . '
                            Hasil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item hapusTes" href="javascript:void(0)" data-id="$1">
                            ' . tablerIcon("trash", "me-1") . '
                            Hapus
                        </a>
                    </div>
                </span>', 'id_tes, md5(id_tes)');

        $this->datatables->add_column('link', '
                <button class="copy btn btn-success" data-clipboard-text="' . $config[1]['value'] . '/soal/id/$1">
                    ' . tablerIcon("copy", "me-1") . '
                    Salin Link
                </button>
            ', 'md5(id_tes), id_tes');

        $this->datatables->edit_column("tgl_tes", '$1', 'tgl_indo(tgl_tes, lengkap)');
        $this->datatables->edit_column("tgl_pengumuman", '$1', 'tgl_indo(tgl_pengumuman, lengkap)');
        return $this->datatables->generate();
    }

    public function loadHasil($tipe, $id)
    {
        $config = $this->config();

        if ($tipe == "TOAFL" || $tipe == "TOEFL") {
            $this->datatables->select("id, id_tes, nama, t4_lahir, tgl_lahir, alamat, alamat_pengiriman, no_wa, email, nilai_listening, nilai_structure, nilai_reading, sertifikat, file, no_doc");
            $this->datatables->from("peserta_toefl");
            $this->datatables->where("md5(id_tes)", $id);
            $this->datatables->edit_column("nilai_listening", '$1', 'poin("Listening", nilai_listening)');
            $this->datatables->edit_column("nilai_structure", '$1', 'poin("Structure", nilai_structure)');
            $this->datatables->edit_column("nilai_reading", '$1', 'poin("Reading", nilai_reading)');
            // $this->datatables->add_column('full', '
            //     <a href="'.base_url().'tes/sertifikat/$1" target="_blank" class="btn btn-info">'.tablerIcon("award", "me-1").'</a>
            // ', 'md5(id)');
            $this->datatables->add_column('polosan', '
                <a href="' . base_url() . 'tes/sertifikat/polosan/$1" target="_blank" class="btn btn-info">' . tablerIcon("award", "me-1") . '</a>
            ', 'md5(id)');
            $this->datatables->add_column('full', '
                <a href="' . base_url() . 'tes/sertifikat/gambar/$1" target="_blank" class="btn btn-info">' . tablerIcon("award", "me-1") . '</a>
            ', 'md5(id)');
            $this->datatables->add_column('skor', '$1', 'skor(nilai_listening, nilai_structure, nilai_reading)');
        } else {
            $this->datatables->select("id, id_tes, nama, email, nilai, no_wa");
            $this->datatables->from("peserta");
            $this->datatables->where("md5(id_tes)", $id);
        }

        $this->datatables->add_column('action', '
                <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                        ' . tablerIcon("menu-2", "me-1") . '
                        Menu
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item editPeserta" href="#detailPesertaLatihan" data-bs-toggle="modal" data-id="$1">
                            ' . tablerIcon("info-circle", "me-1") . '
                            Detail Peserta
                        </a>
                    </div>
                </span>', 'id, md5(id)');
        return $this->datatables->generate();
    }

    public function add_tes()
    {
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $query = $this->add_data("tes", $data);
        if ($query) return 1;
        else return 0;
    }

    public function get_tes()
    {
        $id_tes = $this->input->post("id_tes");

        $data = $this->get_one("tes", ["id_tes" => $id_tes]);
        return $data;
    }

    public function edit_tes()
    {
        $id_tes = $this->input->post("id_tes");
        unset($_POST['id_tes']);

        $query = $this->edit_data("tes", ["id_tes" => $id_tes], $_POST);
        if ($query) return 1;
        else return 0;
    }

    public function change_status()
    {
        $id_tes = $this->input->post("id_tes");

        $status = $this->input->post("status");
        $data = $this->edit_data("tes", ["id_tes" => $id_tes], ["status" => $status]);

        if ($data) return 1;
        else return 0;
    }

    public function hapus_tes()
    {
        $id_tes = $this->input->post("id_tes");

        $data = $this->edit_data("tes", ["id_tes" => $id_tes], ["hapus" => 1, "status" => "Selesai"]);
        if ($data) {
            return 1;
        } else {
            return 0;
        }
    }

    public function edit_peserta_toefl()
    {
        $id = $this->input->post("id");
        unset($_POST['id']);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data = $this->edit_data("peserta_toefl", ["id" => $id], $data);
        if ($data) return 1;
        else return 0;
    }

    public function get_peserta_toefl()
    {
        $id = $this->input->post("id");
        $data = $this->get_one("peserta_toefl", ["id" => $id]);
        $data['tgl_input'] = date("j/n/Y @ H:i:s", strtotime($data['tgl_input']));
        return $data;
    }

    public function get_peserta()
    {
        $id = $this->input->post("id");
        $data = $this->get_one("peserta", ["id" => $id]);
        $data['tgl_input'] = ($data['tgl_input'] == null) ? date("j/n/Y @ H:i:s", strtotime($data['tgl_input'])) : '';
        return $data;
    }

    public function upload_logo()
    {
        if (isset($_FILES['file']['name'])) {

            $id = $this->input->post("id_tes");

            $nama_file = $_FILES['file']['name']; // Nama Audio
            $size        = $_FILES['file']['size']; // Size Audio
            $error       = $_FILES['file']['error'];
            $tipe_audio  = $_FILES['file']['type']; //tipe audio untuk filter
            $folder      = "./assets/logo/"; //folder tujuan upload
            $valid       = array('png', 'PNG'); //Format File yang di ijinkan Masuk ke server

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
                        default:
                            break;
                    }

                    $img_peserta = $id . "." . $tipe_audio;

                    $tmp = $_FILES['file']['tmp_name'];


                    if (move_uploaded_file($tmp, $folder . $img_peserta)) {
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

    public function add_sertifikat_toefl()
    {
        $config = $this->config();

        $id = $this->input->post("id");
        $sertifikat = $this->input->post("sertifikat");

        $peserta = $this->get_one("peserta_toefl", ["id" => $id]);
        $tes = $this->get_one("tes", ["id_tes" => $peserta['id_tes']]);

        $date = date('Y', strtotime($tes['tgl_tes']));

        $this->db->select("CONVERT(no_doc, UNSIGNED INTEGER) AS num");
        $this->db->from("peserta_toefl as a");
        $this->db->join("tes as b", "a.id_tes = b.id_tes");
        $this->db->where("YEAR(tgl_tes)", $date);
        $this->db->order_by("num", "DESC");
        $data = $this->db->get()->row_array();

        if ($data) $no = $data['num'] + 1;
        else $no = 1;

        if ($no > 0 && $no < 10) $no_doc = "00" . $no;
        elseif ($no >= 10 && $no < 100) $no_doc = "0" . $no;
        elseif ($no >= 100) $no_doc = $no;

        $this->load->library('qrcode/ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $id . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $config[1]['value'] . "/sertifikat/no/" . md5($id); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


        // $data = $this->edit_data("peserta_toefl", ["id" => $id], ["no_doc" => $no_doc]);
        $data = $this->edit_data("peserta_toefl", ["id" => $id], ["no_doc" => $no_doc, "sertifikat" => $sertifikat]);
        if ($data) return 1;
        else return 0;
    }
}

/* End of file Tes_model.php */
