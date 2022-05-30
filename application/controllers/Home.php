<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    // public function hapus_peserta(){
    //     $tes = $this->Main_model->get_all("tes");

    //     foreach ($tes as $tes) {
    //         $peserta = COUNT($this->Main_model->get_all("peserta_toefl", ["id_tes" => $tes['id_tes']]));
    //         if($peserta < 300){
    //             $this->Main_model->delete_data("tes", ["id_tes" => $tes['id_tes']]);
    //             $this->Main_model->delete_data("peserta_toefl", ["id_tes" => $tes['id_tes']]);
    //         }
    //     }

    //     echo "cek";
    // }

    public function edit_peserta(){
        $peserta = $this->Main_model->get_all("peserta_toefl");

        foreach ($peserta as $i => $peserta) {
            $data = [
                "nama" => "Peserta ".$i,
                "alamat" => "Alamat ".$i,
                "email" => "email".$i."@gmail.com",
                "no_wa" => "",
            ];

            $this->Main_model->edit_data("peserta_toefl", ["id" => $peserta['id']], $data);
        }

        echo "cek";
    }

    public function index(){
        // navbar and sidebar
        $data['menu'] = "Home";

        // for title and header 
        $data['title'] = "Home";

        $data['modal'] = ["modal_setting"];
        // javascript 
        $data['js'] = [
            "modules/other.js",
            "modules/setting.js",
        ];
        
        $data['tes'] = COUNT($this->Main_model->get_all("tes", ["hapus" => 0]));
        
        $this->db->select("COUNT(id) as peserta");
        $this->db->from("peserta_toefl");
        $query = $this->db->get()->row_array();
        $data['peserta'] = $query['peserta'];

        $this->db->select("COUNT(id) as peserta");
        $this->db->from("peserta_toefl");
        $this->db->where("no_doc !=", "");
        $query = $this->db->get()->row_array();
        $data['sertifikat'] = $query['peserta'];

        $data['label'] = [];
        $tes = $this->Main_model->get_all("tes", ["hapus" => 0]);
        foreach ($tes as $i => $tes) {
            $data['label'][$i] = date("d-m-y", strtotime($tes['tgl_tes']));
            $data['data'][$i] = COUNT($this->home->get_all("peserta_toefl", ["id_tes" => $tes['id_tes']]));
        }

        $data['label'] = json_encode($data['label']);
        $data['data'] = json_encode($data['data']);
        // var_dump($data);

        $this->load->view("pages/index", $data);
    }

    public function nilai_toefl(){
        // navbar and sidebar
        $data['menu'] = "Nilai TOEFL";

        // for title and header 
        $data['title'] = "Nilai TOEFL";

        $data['modal'] = ["modal_setting"];
        // javascript 
        $data['js'] = [
            "modules/other.js",
            "modules/setting.js",
        ];

        $data['listening'] = $this->Main_model->get_all("nilai_toefl", ["tipe" => "Listening"], "soal");
        $this->load->view("pages/nilai_toefl", $data);
    }

    public function get_dashboard(){
        $data['soal'] = COUNT($this->Main_model->get_all("soal", ["hapus" => 0]));
        $data['tes'] = COUNT($this->Main_model->get_all("tes", ["hapus" => 0]));
        $data['peserta'] = COUNT($this->Main_model->get_all("peserta"));

        echo json_encode($data);
    }

    public function getSetting(){
        $data['web_admin'] = $this->Main_model->get_one("config", ["field" => "web admin"]);
        $data['web_peserta'] = $this->Main_model->get_one("config", ["field" => "web peserta"]);
        $data['no_wa'] = $this->Main_model->get_one("config", ["field" => "no_wa"]);

        echo json_encode($data);
    }

    public function get_poin($tipe){
        if($tipe == "listening"){
            $data = $this->Main_model->get_all("nilai_toefl", ["tipe" => "Listening"], "soal");
        } else if($tipe == "structure"){
            $data = $this->Main_model->get_all("nilai_toefl", ["tipe" => "Structure"], "soal");
        } else if($tipe == "reading"){
            $data = $this->Main_model->get_all("nilai_toefl", ["tipe" => "Reading"], "soal");
        }

        echo json_encode($data);
    }

    public function edit_pengaturan(){
        $data = $this->home->edit_pengaturan();
        echo json_encode($data);
    }

    public function edit_poin(){
        $data = $this->home->edit_poin();
        echo json_encode(1);
    }

    public function upload_logo(){
        if(isset($_FILES['file']['name'])) {

            $nama_file = $_FILES['file']['name']; // Nama Audio
            $size        = $_FILES['file']['size'];// Size Audio
            $error       = $_FILES['file']['error'];
            $tipe_img  = $_FILES['file']['type']; //tipe audio untuk filter
            $folder      = "./assets/img/"; //folder tujuan upload
            $valid       = array('png', 'PNG'); //Format File yang di ijinkan Masuk ke server
            
            if(strlen($nama_file)){   
                 // Perintah untuk mengecek format gambar
                 list($txt, $ext) = explode(".", $nama_file);
                 if(in_array($ext,$valid)){   

                     // Perintah untuk mengupload file dan memberi nama baru
                    switch ($tipe_img) {
                        case 'image/jpeg':
                            $tipe_img = "jpg";
                            break;
                        case 'image/png':
                            $tipe_img = "png";
                            break;
                        case 'image/gif':
                            $tipe_img = "gif";
                            break;
                        default:
                            break;
                    }

                     $img_agency = "logo.png";

                     $tmp = $_FILES['file']['tmp_name'];
                    
                     
                    if(move_uploaded_file($tmp, $folder.$img_agency)){
                        echo json_encode(1);
                    } else { // Jika Audio Gagal Di upload 
                        echo json_encode(0);
                    }
                 } else{ 
                    echo json_encode(2);
                }
        
            }
            
        }
    }

    public function getPengaturanAkun(){
        $data = $this->home->getPengaturanAkun();
        echo json_encode($data);
    }
}

/* End of file Home.php */
