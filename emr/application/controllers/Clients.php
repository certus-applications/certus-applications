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
        $datetime = new DateTime($datesArr[$i]);
        $datetime->modify('5:00:00');
        $mornTimeArr[] = $datetime->format('m/j/Y H:i:s');
      }
      for($i = 0; $i<14; $i++) {
        $datetime = new DateTime($datesArr[$i]);
        $datetime->modify('13:00:00');
        $eveTimeArr[] = $datetime->format('m/j/Y H:i:s');
      }
      for($i = 0; $i<14; $i++) {
        $datetime = new DateTime($datesArr[$i]);
        $datetime->modify('19:00:00');
        $nightTimeArr[] = $datetime->format('m/j/Y H:i:s');
      }	

      $data['datesArr'] = $datesArr;
      $data['mornTimeArr'] = $mornTimeArr;
      $data['eveTimeArr'] = $eveTimeArr;
      $data['nightTimeArr'] = $nightTimeArr;

    //  foreach ( $this->input->post('morn-times') as $morn_time) {
    //   // some stuff here
    //  }

     $this->load->view('main/header');
     $this->load->view('main/sidebar');
     $this->load->view('clients/add', $data);
     $this->load->view('main/footer');
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
