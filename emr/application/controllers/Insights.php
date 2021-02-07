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
        $this->load->model('Screeners_model');

        if ($this->ion_auth->is_admin()) {
          $data["userRole"] = "ADMIN";
          $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
          $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
          $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];

          $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
          $data["link"] = ["main/index", "screeners", "billing", "insights", "activity", "reminders"];
          $data["icon"] = ["calendar","user", "building", "exclamation-triangle", "bookmark-o", "check-square-o"];    
        } elseif ($this->ion_auth->in_group("hostpial admin")) {
          $data["userRole"] = "HOSPITAL ADMIN";
          $data["options"] = ["Logout"];
          $data["href"] = ["auth/logout"];
          $data["font"] = ["refresh", "sign-out"];

          $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
          $data["link"] = ["main/index", "screeners", "billing", "insights", "activity", "reminders"];
          $data["icon"] = ["calendar","user", "building", "exclamation-triangle", "bookmark-o", "check-square-o"];  
        } else {
          $data["userRole"] = "SCREENER";
          $data["options"] = ["Logout"];
          $data["href"] = ["auth/logout"];
          $data["font"] = ["sign-out"];

          $data["sideMenu"] = ["Calendar", "Availability", "Request"];
          $data["link"] = ["main/index", "screeners/add", "screeners/request"];
          $data["icon"] = ["calendar","user", "exclamation-triangle"];
        }
        
        $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
        $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
        $this->load->view('main/header');
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $data['clientsAll'] = $this->Screeners_model->listAll();
        $this->load->view('insights/main', $data);
        $this->load->view('main/footer');
    }

    public function analytics($id){

      if ($this->ion_auth->is_admin()) {
        $data["userRole"] = "ADMIN";
        $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
        $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
        $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
        $data["link"] = ["main/index", "screeners", "billing", "insights", "activity", "reminders"];
        $data["icon"] = ["calendar","user", "building", "exclamation-triangle", "bookmark-o", "check-square-o"];    
      } elseif ($this->ion_auth->in_group("hostpial admin")) {
        $data["userRole"] = "HOSPITAL ADMIN";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
        $data["link"] = ["main/index", "screeners", "billing", "insights", "activity", "reminders"];
        $data["icon"] = ["calendar","user", "building", "exclamation-triangle", "bookmark-o", "check-square-o"];  
      } else {
        $data["userRole"] = "SCREENER";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["sign-out"];

        $data["sideMenu"] = ["Calendar", "Add Availability"];
        $data["link"] = ["main/index", "screeners/add"];
        $data["icon"] = ["calendar","user"];
      }
      
      $this->load->model('Screeners_model');
      $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
      $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
      $this->load->view('main/header');
      $this->load->view('main/sidebar', $data);
      $this->load->view('main/topbar', $data);
      $data['viewClient'] = $this->Screeners_model->viewClient($id);
      $this->load->view('insights/analytics', $data);
      $this->load->view('main/footer');
  }
}