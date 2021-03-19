<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
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
			$data["options"] = ["Change Password", "Logout"];
			$data["href"] = ["auth/change_password", "auth/logout"];
			$data["font"] = ["refresh", "sign-out"];
	
			$data["sideMenu"] = ["Calendar", "My Profile", "My Requests"];
			$data["link"] = ["main/index", "profile", "request/view"];
			$data["icon"] = ["calendar","user", "check-square-o"];
		}
		$first_name = $this->ion_auth->user()->row()->first_name;
		$last_name = $this->ion_auth->user()->row()->last_name;

		$data["userFirstName"] = $first_name;
		$data["userLastName"] = $last_name;
		$data["email"] = $this->ion_auth->user()->row()->email;
		$data["screenerID"] = $this->ion_auth->user()->row()->employeeid;

		$this->load->model('Schedule_model');
		$data['scheduleViewScreener'] = $this->Schedule_model->getScheduleScreener($first_name, $last_name);
		$this->load->model('Availability_model');
      	$data['screenerAvail'] = $this->Availability_model->screenerAvail($first_name, $last_name);

		$this->load->view('main/header');
		$this->load->view('main/sidebar', $data);
		$this->load->view('main/topbar', $data);
		$this->load->view('screeners/profile');
		$this->load->view('main/footer');
    }
}
?>