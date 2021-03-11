<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shifts extends CI_Controller {
    public function __construct() {
      parent::__construct();
    }

    public function index(){
		if ($this->ion_auth->is_admin()) {
			$data["userRole"] = "ADMIN";
			$data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
			$data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
			$data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];

			$data["sideMenu"] = ["Calendar", "Screeners", "Locations", "Requests"];
			$data["link"] = ["main/index", "screeners", "locations", "request/view"];
			$data["icon"] = ["calendar","user", "building", "exclamation-triangle"];
		} elseif ($this->ion_auth->in_group("hostpial admin")) {
			$data["userRole"] = "HOSPITAL ADMIN";
			$data["options"] = ["Logout"];
			$data["href"] = ["auth/logout"];
			$data["font"] = ["refresh", "sign-out"];

			$data["sideMenu"] = ["Calendar", "Screeners", "Locatons", "Requests"];
			$data["link"] = ["main/index", "screeners", "locations", "request/view"];
			$data["icon"] = ["calendar","user", "building", "exclamation-triangle"]; 
		} else {
			$data["userRole"] = "SCREENER";
			$data["options"] = ["Logout"];
			$data["href"] = ["auth/logout"];
			$data["font"] = ["sign-out"];

			$data["sideMenu"] = ["Calendar", "Availability", "Request"];
			$data["link"] = ["main/index", "screeners/add", "screeners/request"];
			$data["icon"] = ["calendar","user", "exclamation-triangle"];
		}

		$this->load->model('Locations_model');

		$this->load->view('shifts/index', $data);
    }
}