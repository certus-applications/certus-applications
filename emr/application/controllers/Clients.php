<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
    public function __construct() {
      parent::__construct();

      if (!$this->ion_auth->logged_in()) {
        redirect('auth/login', 'refresh');
      }
    }

    public function index(){
      $this->load->model('Clients_model');
      $data['clientsAll'] = $this->Clients_model->listAll();
      $this->load->view('main/header');
      $this->load->view('main/sidebar');
      //passing the data in list
      $this->load->view('clients/list', $data);
      $this->load->view('main/footer');
    }

    public function add(){
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
        $mornTimeArr[] = $datetime->format('Y-m-d H:i:s a');
      }
      for($i = 0; $i<14; $i++) {
        $datetime = new DateTime($datesArr[$i].'13:00:00');
        $eveTimeArr[] = $datetime->format('Y-m-d h:i:s');
      }
      for($i = 0; $i<14; $i++) {
        $datetime = new DateTime($datesArr[$i].'19:00:00');
        $nightTimeArr[] = $datetime->format('Y-m-d h:i:s');
      }	

     $data['datesArr'] = $datesArr;
     $data['mornTimeArr'] = $mornTimeArr;
     $data['eveTimeArr'] = $eveTimeArr;
     $data['nightTimeArr'] = $nightTimeArr;

     $this->load->view('main/header');
     $this->load->view('main/sidebar');
     $this->load->view('clients/add', $data);
     $this->load->view('main/footer');
    }

    public function added_time() {
      $morn_times = $this->input->post('morn_times');
      $eve_times = $this->input->post('eve_times');
      $night_times = $this->input->post('night_times');

      for ($i=0; $i < sizeof($morn_times); $i++){
        $my_dt = new DateTime($morn_times[$i]);
        $expires_at = $my_dt->modify(' +8 hour');
        $end_date = $expires_at->format('Y-m-d h:i:s');
        
        $morn = array(
          'title' => 'John Doe',
          'start' => $morn_times[$i],
          'end' => $end_date
        );
        $this->db->insert('schedule', $morn);
      }

      for($i=0; $i < sizeof($eve_times); $i++){
        $my_dt = new DateTime($eve_times[$i]);
        $expires_at = $my_dt->modify(' +8 hour');
        $end_date = $expires_at->format('Y-m-d h:i:s');

        $eve = array(
          'title' => 'Evening Smith',
          'start' => $eve_times[$i],
          'end' => $end_date
        );
        $this->db->insert('schedule', $eve);
      }

      for($i=0; $i < sizeof($night_times); $i++){
        $my_dt = new DateTime($morn_times[$i]);
        $expires_at = $my_dt->modify(' +8 hour');
        $end_date = $expires_at->format('Y-m-d h:i:s');

        $night = array(
          'title' => 'Night James',
          'start' => $night_times[$i],
          'end' => $end_date
        );
        $this->db->insert('schedule', $night);
      
      }
    return redirect('clients');
    }

    public function view($id){
     $this->load->model('Clients_model');
     $data['viewClient'] = $this->Clients_model->viewClient($id);
     $this->load->view('main/header');
     $this->load->view('main/sidebar');
     //$this->load->view('clients/view');
     $this->load->view('clients/view', $data);
     $this->load->view('main/footer');

    }


}
