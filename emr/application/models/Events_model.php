<?php

class Events_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function listAll(){
        $this->db->select('*');
        $this->db->from('events');
        $query=$this->db->get();
        $returnData = $query->result_array();

        // Echo DB into JSON
        // echo json_encode($returnData);
        
        return $returnData;
    }
}