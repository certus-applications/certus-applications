<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminders extends CI_Controller {
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

       $data["sideMenu"] = ["Calendar", "Screeners", "Locations", "Requests"];
       $data["link"] = ["main/index", "screeners", "locations", "insights", "activity", "reminders"];
       $data["icon"] = ["calendar","user", "building", "exclamation-triangle", "bookmark-o", "check-square-o"];    
     } elseif ($this->ion_auth->in_group("hostpial admin")) {
       $data["userRole"] = "HOSPITAL ADMIN";
       $data["options"] = ["Logout"];
       $data["href"] = ["auth/logout"];
       $data["font"] = ["refresh", "sign-out"];

       $data["sideMenu"] = ["Calendar", "Screeners", "Locations", "Requests"];
       $data["link"] = ["main/index", "screeners", "locations", "insights", "activity", "reminders"];
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
     $this->load->view('reminders/view');
     $this->load->view('main/footer');
    }
}
