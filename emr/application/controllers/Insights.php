<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insights extends CI_Controller {
    public function __construct() {
      parent::__construct();

      if (!$this->ion_auth->logged_in()) {
        redirect('auth/login', 'refresh');
      }
    }

    public function index(){
        $this->load->model('Clients_model');
        $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
        $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar');
        $data['clientsAll'] = $this->Clients_model->listAll();
        $this->load->view('insights/main', $data);
        $this->load->view('main/footer');
    }

    public function analytics($id){
        $this->load->model('Clients_model');
        $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
        $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
        $this->load->view('main/header');
        $this->load->view('main/sidebar', $data);
        $data['viewClient'] = $this->Clients_model->viewClient($id);
        $this->load->view('insights/analytics', $data);
        $this->load->view('main/footer');
   
       }



}
