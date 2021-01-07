<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        session_start();
        parent::__construct();
        
    }

    public function index(){
        // File json yang akan dibaca (full path file)
        $file = "menumakan.json";

        // Mendapatkan file json
        $anggota = file_get_contents($file);
        // Mendecode menumakan.json
        $var['data'] = json_decode($anggota, true);
        $this->load->view('main',$var);
    }

    public function insert(){
        // File json yang akan dibaca
        $file = "menumakan.json";

        // Mendapatkan file json
        $anggota = file_get_contents($file);

        // Mendecode menumakan.json
        $data = json_decode($anggota, true);
        $end_data=end($data)['no'];
        $namamakanan = $_POST['namamakanan'];

        // Data array baru
        $data [] = array(
            'no'     => $end_data+1,
            'nama'   => $namamakanan,
            'alamat' => 'Kediri'
        );

        // Mengencode data menjadi json
        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);

        // Menyimpan data ke dalam menumakan.json
        $anggota = file_put_contents($file, $jsonfile);
        redirect('user');
    }

    public function delete($no){
        // File json yang akan dibaca
        $file = "menumakan.json";
        
        // Mendapatkan file json
        $anggota = file_get_contents($file);
        
        // Mendecode menumakan.json
        $data = json_decode($anggota, true);
        // Membaca data array menggunakan foreach
        foreach ($data as $key => $d) {
            // Hapus data kedua
            if ($d['no'] == $no) {
                // Menghapus data array sesuai dengan index
                // Menggantinya dengan elemen baru
                array_splice($data, $key, 1);
            }
        }
        
        // Mengencode data menjadi json
        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        
        // Menyimpan data ke dalam menumakan.json
        $anggota = file_put_contents($file, $jsonfile);
        redirect('user');
    }

}

  