<?php
/**
 * Created by PhpStorm.
 * User: My Computer
 * Date: 11/23/2017
 * Time: 1:25 PM
 */
class tanya_model extends CI_Model{
    function insert($tanya){
        $this->db->insert('tanya',$tanya);
        return $this->db->insert_id();
    }
    function get($unik_id){
        $this->db->select("*");
        $this->db->from("tanya");
        $this->db->where('unik_id',$unik_id);
        return $this->db->get()->row();
    }
    function update($tanya){
        $this->db->update('tanya',$tanya);
    }
}