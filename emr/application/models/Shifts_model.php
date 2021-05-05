<?php

class Shifts_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function add($shiftData) {
        extract($shiftData);
        $this->db->insert('check_in_out', $shiftData);
    }

    public function update($update_shift) {
        extract($update_shift);
        $this->db->where('screener_id', $screener_id);
        $this->db->where('check_in', $check_in);
        $this->db->update('check_in_out', $update_shift);
    }

    public function getAll() {
        $this->db->select('*');
        $this->db->from('check_in_out');
        $query = $this->db->get();
        $returnData = $query->result_array();
        return $returnData;
    }

}