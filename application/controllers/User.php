<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        session_start();
        parent::__construct();
        
    }

    public function index(){

        $var['data'] = $this->db->get("menu")->result_array();
        $this->load->view('main',$var);
    }

    public function insert(){

        $namamakanan = $_POST['namamakanan'];

        // Data array baru
        $data = array(
            'nama'   => $namamakanan,
        );

        $this->db->insert("menu",$data);
        redirect('user');
    }

    public function delete($no){
        $this->db->delete("menu",array("no"=>$no));
        redirect('user');
    }

}

  