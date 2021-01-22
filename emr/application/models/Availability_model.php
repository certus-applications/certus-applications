<?php

class Availability_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getAvailability(){
        $this->db->select('*');
        $this->db->from('availability');
        $query=$this->db->get();
        $returnData = $query->result_array();
        
        return $returnData;
    }

    // public function getScheduleScreener($employeeid){
    //     $this->db->select('*');
    //     $this->db->from('schedule');
    //     $this->db->where('employeeid', $employeeid);
    //     $query=$this->db->get();
    //     return $query->result_array();
    // }
}