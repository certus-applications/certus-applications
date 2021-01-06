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
     $this->load->view('clients/add');
     $this->load->view('main/footer');
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
