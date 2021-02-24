<?php
   // do all database calls here
   class Screeners_model extends CI_Model {

      function __construct() {
         parent::__construct();
      }

      public function listAll(){
        $sql="SELECT user_id, first_name, last_name FROM users AS USER INNER JOIN users_groups AS user_group ON USER.id = user_group.user_id WHERE user_group.group_id = 4";    
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      public function viewClient($id){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array(); 

      }

      public function email_check($email){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $query=$this->db->get();

        if($query->num_rows()>0){
           return false;
        } else {
           return true;
        }
      }

      public function login_user($username, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$username);
        $this->db->where('password',$password);

        if($query=$this->db->get()){
          return $query->row_array();
        }else{
          return false;
        }
      }

      public function editSchedule($scheduleData){
        extract($scheduleData);
        $this->db->where('id', $id);
        $this->db->update('schedule', $scheduleData);
      }

      public function addSchedule($scheduleData){
        extract($scheduleData);
        $this->db->insert('schedule', $scheduleData);
      }
    }
