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
            $this->session->userdata('unik_id');

        }else{
            $this->session->userdata('unik_id');
        }


        $data['unik_id']= $this->session->userdata('unik_id');
        $this->load->view('ask',$data);

    }
    function ask(){

    }

    function requestSoal(){
        $unik_id=$this->session->userdata('unik_id');
        $data =$this->tanya_model->get($unik_id);
        $soal =$data->soal;
        if(!empty($soal) && ($data->jawab == "0")){
            $result ="00x00".$soal;
            echo $result;
        }else{
            echo "belum ada soal";
        }
    }


    function requestJawab(){
        $unik_id=$this->input->post('unik_id');
        $unik_id = trim($unik_id);
        $data =$this->tanya_model->get($unik_id);

        $jawab =$data->jawab;

        if(!empty($jawab)){
            $result ="00x00".$jawab;
            echo $result;
        }else{
            //belum ada jawaban
        }
    }

    function setJawab(){
        $jawab=$this->input->post('jawab');
        $unik_id=$this->input->post('unik_id');
        $unik_id = trim($unik_id);
        $data =$this->tanya_model->get($unik_id);
        $data->jawab=$jawab;
        $this->tanya_model->update($data);

    }

    function addSoal(){
        $soal=$this->input->post('tanya');
        $unik_id= $this->session->userdata('unik_id');
        $tanya =array("soal"=>$soal,"jawab"=>0,"unik_id"=>$unik_id);
        $data =$this->tanya_model->get($unik_id);
        if(empty($data)){
            $id=  $this->tanya_model->insert($tanya);
        }else{
            $this->tanya_model->update($tanya);
        }

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