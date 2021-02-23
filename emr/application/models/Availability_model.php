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

    public function add_morning($morn) {
        extract($morn);
        $this->db->insert('availability', $morn);
    }

    public function add_eve($eve) {
        extract($eve);
        $this->db->insert('availability', $eve);
    }

    public function add_night($night) {
        extract($night);
        $this->db->insert('availability', $night);
    }

    // public function getScheduleScreener($employeeid){
    //     $this->db->select('*');
    //     $this->db->from('schedule');
    //     $this->db->where('employeeid', $employeeid);
    //     $query=$this->db->get();
    //     return $query->result_array();
    // }
}