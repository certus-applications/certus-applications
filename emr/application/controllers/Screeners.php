<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screeners extends CI_Controller {
    public function __construct() {
      parent::__construct();

      if (!$this->ion_auth->logged_in()) {
        redirect('auth/login', 'refresh');
      }
    }

    public function index(){

      if ($this->ion_auth->is_admin()) {
        $data["userRole"] = "ADMIN";
        $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
        $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
        $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];    
      } elseif ($this->ion_auth->in_group("hostpial admin")) {
        $data["userRole"] = "HOSPITAL ADMIN";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["refresh", "sign-out"]; 
      } else {
        $data["userRole"] = "SCREENER";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["sign-out"];
      }

      $this->load->model('Clients_model');
      $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
      $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
      $this->load->view('main/header');
      $this->load->view('main/sidebar', $data);
      //passing the data in list
      $data['clientsAll'] = $this->Clients_model->listAll();
      $this->load->view('clients/list', $data);
      $this->load->view('main/footer');
    }

    public function add(){

    if ($this->ion_auth->is_admin()) {
      $data["userRole"] = "ADMIN";
      $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
      $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
      $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];    
    } elseif ($this->ion_auth->in_group("hostpial admin")) {
      $data["userRole"] = "HOSPITAL ADMIN";
      $data["options"] = ["Logout"];
      $data["href"] = ["auth/logout"];
      $data["font"] = ["refresh", "sign-out"]; 
    } else {
      $data["userRole"] = "SCREENER";
      $data["options"] = ["Logout"];
      $data["href"] = ["auth/logout"];
      $data["font"] = ["sign-out"];
    }
      
     $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
     $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
     $this->load->view('main/header');
     $this->load->view('main/sidebar', $data);
    //  $this->load->view('clients/add');

      // Week 1 and week 2 timespan
      $day = date('w'); 
      $week_start = date('m/j/Y', strtotime('-'.$day.' days'));
      $week_end = date('m/j/Y', strtotime('+'.(6-$day).' days'));	
      $week_2start = date('m/j/Y', strtotime('+'.(7-$day).' days'));
      $week_2end = date('m/j/Y', strtotime('+'.(13-$day).' days'));

      // Getting individual dates for each day
      $datesArr = array();
      for($i = 0;  $i < 14; $i++) {
        $date = date('m/j/Y', strtotime("$week_start + $i days"));
        $datesArr[] = $date;
      }

      $data['week_start'] = $week_start;
      $data['week_2start'] = $week_2start;
      $data['week_end'] = $week_end;
      $data['week_2end'] = $week_2end;

      $mornTimeArr = array();
      $eveTimeArr = array();
      $nightTimeArr = array();

      for($i = 0; $i<14; $i++) {
        $datetime = new DateTime($datesArr[$i].'05:00:00');
        $mornTimeArr[] = $datetime->format('Y-m-d H:i:s');
      }
      for($i = 0; $i<14; $i++) {
        $datetime = new DateTime($datesArr[$i].'13:00:00');
        $eveTimeArr[] = $datetime->format('Y-m-d H:i:s');
      }
      for($i = 0; $i<14; $i++) {
        $datetime = new DateTime($datesArr[$i].'23:00:00');
        $nightTimeArr[] = $datetime->format('Y-m-d H:i:s');
      }	

     $data['datesArr'] = $datesArr;
     $data['mornTimeArr'] = $mornTimeArr;
     $data['eveTimeArr'] = $eveTimeArr;
     $data['nightTimeArr'] = $nightTimeArr;

     // Uneditable information
     $data['first_name'] = $this->ion_auth->user()->row()->first_name;
     $data['last_name'] = $this->ion_auth->user()->row()->last_name;
     $data['employeeid'] = $this->ion_auth->user()->row()->employeeid;
     $data['email'] = $this->ion_auth->user()->row()->email;

     $this->load->view('clients/add', $data);
     $this->load->view('main/footer');
    }

    public function added_time() {
      // Uneditable information
      $data['first_name'] = $this->ion_auth->user()->row()->first_name;
      $data['last_name'] = $this->ion_auth->user()->row()->last_name;
      $data['employeeid'] = $this->ion_auth->user()->row()->employeeid;
      $data['email'] = $this->ion_auth->user()->row()->email;

      // Getting Dates
      $morn_times = $this->input->post('morn_times');
      $eve_times = $this->input->post('eve_times');
      $night_times = $this->input->post('night_times');

      for ($i=0; $i < sizeof($morn_times); $i++){
        $my_dt = new DateTime($morn_times[$i]);
        $expires_at = $my_dt->modify(' +8 hour');
        $end_date = $expires_at->format('Y-m-d H:i:s');
        
        $morn = array(
          'employeeid' => $data['employeeid'],
          'first_name' => $data['first_name'],
          'last_name' => $data['last_name'],
          'start' => $morn_times[$i],
          'end' => $end_date
        );
        $this->db->insert('availability', $morn);
      }

      for($i=0; $i < sizeof($eve_times); $i++){
        $my_dt = new DateTime($eve_times[$i]);
        $expires_at = $my_dt->modify(' +8 hour');
        $end_date = $expires_at->format('Y-m-d H:i:s');

        $eve = array(
          'employeeid' => $data['employeeid'],
          'first_name' => $data['first_name'],
          'last_name' => $data['last_name'],
          'start' => $eve_times[$i],
          'end' => $end_date
        );
        $this->db->insert('availability', $eve);
      }

      for($i=0; $i < sizeof($night_times); $i++){
        $my_dt = new DateTime($night_times[$i]);
        $expires_at = $my_dt->modify(' +8 hour');
        $end_date = $expires_at->format('Y-m-d H:i:s');

        $night = array(
          'employeeid' => $data['employeeid'],
          'first_name' => $data['first_name'],
          'last_name' => $data['last_name'],
          'start' => $night_times[$i],
          'end' => $end_date
        );
        $this->db->insert('availability', $night);
      
      }
    return redirect('screeners');
    }

    public function view($id){

     if ($this->ion_auth->is_admin()) {
       $data["userRole"] = "ADMIN";
       $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
       $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
       $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];    
     } elseif ($this->ion_auth->in_group("hostpial admin")) {
       $data["userRole"] = "HOSPITAL ADMIN";
       $data["options"] = ["Logout"];
       $data["href"] = ["auth/logout"];
       $data["font"] = ["refresh", "sign-out"]; 
     } else {
       $data["userRole"] = "SCREENER";
       $data["options"] = ["Logout"];
       $data["href"] = ["auth/logout"];
       $data["font"] = ["sign-out"];
     }

     $this->load->model('Clients_model');
     $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
     $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
     $this->load->view('main/header', $data);
     $this->load->view('main/sidebar');
     //$this->load->view('clients/view');
     $data['viewClient'] = $this->Clients_model->viewClient($id);
     $this->load->view('clients/view', $data);
     $this->load->view('main/footer');

    }


}
