<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev extends CI_Controller {

  public function index() {
    $this->load->helper('url');
    $this->load->view('dev');
  }

  public function start() {
    $this->load->helper('url');
    $this->load->view('start');
  }
}
