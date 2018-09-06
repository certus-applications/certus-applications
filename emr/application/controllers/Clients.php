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
      $data['clientsAll'] = $this->Clients_model->listAll();
      var_dump($data);
      $this->load->view('main/header');
      $this->load->view('clients/list');
      $this->load->view('main/footer');
    }


}
