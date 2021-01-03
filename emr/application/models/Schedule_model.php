<?php

class Schedule_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getSchedule(){
        $this->db->select('*');
        $this->db->from('schedule');
        $query=$this->db->get();
        $returnData = $query->result_array();
        
        return $returnData;
    }
}