<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {
    public function __construct() {
      parent::__construct();

      if (!$this->ion_auth->logged_in()) {
        redirect('auth/login', 'refresh');
      }
    }

    public function index(){
      $this->load->model('Schedule_model');
      $data['scheduleView'] = $this->Schedule_model->getSchedule();
      // echo json_encode($data);
      // $this->load->view('schedule/view');

      if ($this->input->is_ajax_request()) {
        echo json_encode($data);
        exit;
      }
      $this->load->view('schedule/view', $data); 
    }
}
