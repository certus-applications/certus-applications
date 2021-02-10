<?php

class Request_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getAvailability(){
        $this->db->select('*');
        $this->db->from('request_timeoff');
        $query=$this->db->get();
        $returnData = $query->result_array();
        
        return $returnData;
    }

    public function addRequest($request) {
        extract($request);
        $this->db->insert('request_timeoff', $request);
    }
}