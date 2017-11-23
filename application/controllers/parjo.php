<?php
/**
 * Created by PhpStorm.
 * User: sma
 * Date: 23/11/2017
 * Time: 17:17
 */
class parjo extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tanya_model');
        $this->load->helper('cookie');
        $this->load->helper('url');
    }
    function index(){
        $this->load->view('parjo_layout');
    }
}