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

    public function getScheduleScreener($firstName, $lastName){
        $this->db->select('*');
        $this->db->from('schedule');
        $this->db->where('first_name', $firstName);
        $this->db->where('last_name', $lastName);
        $this->db->order_by('start','ASC');
        $query=$this->db->get();
        return $query->result_array();
    }



    public function getScheduleScreenerByName($first_name, $last_name){
        $this->db->select('*');
        $this->db->from('schedule');
        $this->db->where('first_name', $first_name);
        $this->db->where('last_name', $last_name);
        $query=$this->db->get();
        return $query->result_array();
    }

    
    public function deleteSchedule($firstName, $lastName, $start_date){
        $this->db->where('first_name', $firstName);
        $this->db->where('last_name', $lastName);        
        $this->db->where('start', $start_date);
        $this->db->delete('schedule');
    }
}