<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkin extends CI_Controller {
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

            $data["sideMenu"] = ["Calendar", "Screeners", "Check-in/Check-out", "Locations", "Requests"];
            $data["link"] = ["main/index", "screeners", "checkin", "locations", "request/view"];
            $data["icon"] = ["calendar","user", "list", "building", "exclamation-triangle"];
		} elseif ($this->ion_auth->in_group("hostpial admin")) {
			$data["userRole"] = "HOSPITAL ADMIN";
			$data["options"] = ["Logout"];
			$data["href"] = ["auth/logout"];
			$data["font"] = ["refresh", "sign-out"];

            $data["sideMenu"] = ["Calendar", "Screeners", "Check-in/Check-out", "Locations", "Requests"];
            $data["link"] = ["main/index", "screeners", "checkin", "locations", "request/view"];
            $data["icon"] = ["calendar","user", "list", "building", "exclamation-triangle"];
		} else {
			redirect('main/index', 'refresh');
		}

		$this->load->model('Locations_model');
		$data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
		$data["userLastName"] = $this->ion_auth->user()->row()->last_name;
		$data['locations'] = $this->Locations_model->listAll();

		$this->load->view('main/header');
		$this->load->view('main/sidebar', $data);
		$this->load->view('main/topbar', $data);
		$this->load->view('checkin/view');
		$this->load->view('main/footer');
    }


}