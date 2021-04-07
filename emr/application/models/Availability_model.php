<?php

class Availability_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getAvailability(){
        $this->db->select('*');
        $this->db->from('availability');
        $this->db->order_by('start','ASC');
        $query=$this->db->get();
        $returnData = $query->result_array();
        
        return $returnData;
    }

    public function screenerAvail($firstname, $lastname){
        $this->db->select('*');
        $this->db->from('availability');
        $this->db->where('first_name', $firstname);
        $this->db->where('last_name', $lastname);
        $this->db->order_by('start','ASC');
        $query=$this->db->get();
        $returnData = $query->result_array();
        
        return $returnData;
    }


    public function addAvail($availData) {
        extract($availData);
        $this->db->insert('availability', $availData);
    }


    // public function getScheduleScreener($employeeid){
    //     $this->db->select('*');
    //     $this->db->from('schedule');
    //     $this->db->where('employeeid', $employeeid);
    //     $query=$this->db->get();
    //     return $query->result_array();
    // }
}