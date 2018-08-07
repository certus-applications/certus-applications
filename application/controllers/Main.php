<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct() {
      parent::__construct();
    }

    public function index(){
      echo "string";
    }

    public function beta(){
     $this->load->view('main/header');
     $this->load->view('main/body');
     $this->load->view('main/footer');
    }
}
