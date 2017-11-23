<?php
/**
 * Created by PhpStorm.
 * User: My Computer
 * Date: 11/23/2017
 * Time: 1:25 PM
 */

class  main extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('tanya_model');
        $this->load->helper('cookie');
        $this->load->helper('url');


    }

    function index(){
        if (is_null($this->session->userdata('unik_id'))) {
            //set yours cookie here
            $unik_id=$this->create_unik_id(4);
            $data= array(
               'unik_id'=>$unik_id
            );
            $this->session->set_userdata($data);
            $unik_id= $this->session->userdata('unik_id');

        }else{
           $unik_id= $this->session->userdata('unik_id');
        }

        echo $unik_id;


    }
    function ask(){
        $this->load->view('ask');
    }
    function addSoal(){
        $soal=$this->input->post('tanya');
        $unik_id= $this->session->userdata('unik_id');
        $tanya =array("soal"=>$soal,"jawab"=>0,"unik_id"=>$unik_id);
        $id=  $this->tanya_model->insert($tanya);
        echo $unik_id;
    }

    function create_unik_id($len){
        $letters = 'ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $huruf= substr(str_shuffle($letters), 0, $len/2);
        $angkas = '123456789';
        $angka= substr(str_shuffle($angkas), 0, $len/2);
        return $angka.$huruf;
    }
}