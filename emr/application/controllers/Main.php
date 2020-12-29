<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct() {
      parent::__construct();

      if (!$this->ion_auth->logged_in()) {
        redirect('auth/login', 'refresh');
      }
    }

    public function index(){
     //$data['eventsAll'] = $this->Events_model->listAll();
     $this->load->view('main/header');
     $this->load->view('main/sidebar');
     //$this->load->view('calendar/view', $data);
     $this->load->view('calendar/view');
     $this->load->view('main/footer');
    }

    public function saveEvent() {
      $this->output->set_content_type('application/json');
      echo json_encode(array('check' => 'Ajax successful'));
    }

}
