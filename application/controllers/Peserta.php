<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends MY_Controller {
    public function index(){
        // navbar and sidebar
        $data['menu'] = "Peserta";

        // for title and header 
        $data['title'] = "List Peserta";

        // for modal 
        $data['modal'] = [
            "modal_peserta",
            "modal_setting"
        ];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "modules/setting.js",
            "load_data/peserta_reload.js",
            "modules/peserta.js",
        ];

        $listSoal = $this->peserta->get_all("soal", ["hapus" => 0], "nama_soal");
        foreach ($listSoal as $i => $list) {
            $data['listSoal'][$i] = $list;
            $data['listSoal'][$i]['soal'] = jum_soal($list['id_soal']);
        }

        $this->load->view("pages/peserta/list", $data);
    }
    
    public function loadPeserta(){
        header('Content-Type: application/json');
        $output = $this->peserta->loadPeserta();
        echo $output;
    }

    public function add_peserta(){
        $data = $this->peserta->add_peserta();
        echo json_encode($data);
    }

    public function edit_peserta(){
        $data = $this->peserta->edit_peserta();
        echo json_encode($data);
    }
    
    public function get_peserta(){
        $id_peserta = $this->input->post("id_peserta");

        $data = $this->peserta->get_one("peserta_bussiness", ["id_peserta" => $id_peserta]);
        echo json_encode($data);
    }

    public function add_soal_peserta(){
        $data = $this->peserta->add_soal_peserta();
        echo json_encode($data);
    }

    public function get_soal_peserta($id){
        $data = $this->peserta->get_soal_peserta($id);
        echo json_encode($data);
    }

    public function hapus_soal(){
        $data = $this->peserta->hapus_soal();
        echo json_encode($data);
    }
    // load
}

/* End of file Tes.php */
