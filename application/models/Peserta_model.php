<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends MY_Model {

    public function loadPeserta(){
        $config = $this->config();

        $this->datatables->select("id_peserta, tgl_input, nama_peserta, no_hp, email, jumlah_tes, tampilan_soal");
        $this->datatables->from("peserta_bussiness");

        $this->datatables->add_column('action','
                <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                        '.tablerIcon("menu-2", "me-1").'
                        Menu
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item editPeserta" href="#editPeserta" data-bs-toggle="modal" data-id="$1">
                            '.tablerIcon("info-circle", "me-1").'
                            Detail Peserta
                        </a>
                        <a class="dropdown-item" href="'.$config[1]['value'].'/peserta/id/$2" target="_blank">
                            '.tablerIcon("award", "me-1").'
                            Link Peserta
                        </a>
                    </div>
                </span>', 'id_peserta, md5(id_peserta)');
        return $this->datatables->generate();
    }

    public function add_peserta(){
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $query = $this->add_data("peserta_bussiness", $data);
        if($query) return 1;
        else return 0;
    }

    public function get_peserta(){
        $id_peserta = $this->input->post("id_peserta");

        $data = $this->get_one("peserta_bussiness", ["id_peserta" => $id_peserta]);
        return $data;
    }

    public function edit_peserta(){
        $id_peserta = $this->input->post("id_peserta");
        unset($_POST['id_peserta']);

        $query = $this->edit_data("peserta_bussiness", ["id_peserta" => $id_peserta], $_POST);
        if($query) return 1;
        else return 0;
    }

    public function add_soal_peserta(){
        $data = [
            "id_peserta" => $this->input->post("id_peserta"),
            "id_soal" => $this->input->post("id_soal")
        ];

        $query = $this->add_data("peserta_soal", $data);
        if($query) return 1;
        else return 0;
    }

    public function get_soal_peserta($id){
        $sub = $this->get_all("peserta_soal", ["id_peserta" => $id]);
        
        $data = [];
        foreach ($sub as $i => $sub) {
            $data_sub = $this->get_one("soal", ["id_soal" => $sub['id_soal']]);
            $data[$i] = $data_sub;
            $data[$i]['id'] = $sub['id'];
        }

        return $data;
    }

    public function hapus_soal(){
        $id = $this->input->post("id");

        $query = $this->delete_data("peserta_soal", ["id" => $id]);
        if($query) return 1;
        else return 0;
    }
}

/* End of file Peserta_model.php */
