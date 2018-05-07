<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatbot extends CI_Controller {

  public function index() {
    // $this->load->helper('url');
    redirect('/login', 'refresh');
  }
}
