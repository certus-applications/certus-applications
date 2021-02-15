<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
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

        $data["sideMenu"] = ["Calendar", "Availability", "My Requests"];
        $data["link"] = ["main/index", "screeners/add", "request/viewRequest"];
        $data["icon"] = ["calendar","user", "check-square-o"];
      }

      $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
      $data["userLastName"] = $this->ion_auth->user()->row()->last_name;

      $this->load->view('main/header');
      $this->load->view('main/sidebar', $data);
      $this->load->view('main/topbar', $data);
      $this->load->view('screeners/request');
      $this->load->view('main/footer');
    }

    public function addRequest() {
      // User info to send to database
      $data['first_name'] = $this->ion_auth->user()->row()->first_name;
      $data['last_name'] = $this->ion_auth->user()->row()->last_name;
      $data['employeeid'] = $this->ion_auth->user()->row()->employeeid;  

      $type = $this->input->post('timeoff_type');
      $text = $this->input->post('other-text');
      $start = $this->input->post('start_date');
      $end = $this->input->post('end_date');

      $request = array(
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'timestamp' => date('Y-m-d H:i:s'),
        'employeeid' => $data['employeeid'],
        'start' => date('Y-m-d', strtotime ($start)),
        'end' => date('Y-m-d', strtotime ($end)),
        'reason' => $type.' '.$text
      );


      $this->Request_model->addRequest($request);

      return redirect('request', 'refresh');
    }

    public function updateRequest() {
      $choice = $this->input->post('choice');

      if($choice == 'Approve') {
        $update_req = array (
          'id' => $this->input->post('id'),
          'approved' => TRUE
        );
        $this->Request_model->updateRequest($update_req);
        return redirect('insights', 'refresh');
      } else{
        $update_req = array (
          'id' => $this->input->post('id'),
          'approved' => FALSE
        );
        $this->Request_model->updateRequest($update_req);
        return redirect('insights', 'refresh');
      }

    }

    public function viewRequest(){
      $this->load->model('Availability_model');
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

        $data["sideMenu"] = ["Calendar", "Availability", "My Requests"];
        $data["link"] = ["main/index", "screeners/add", "request/viewRequest"];
        $data["icon"] = ["calendar","user", "check-square-o"];;
      }

      $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
      $data["userLastName"] = $this->ion_auth->user()->row()->last_name;

      $this->load->view('main/header');
      $this->load->view('main/sidebar', $data);
      $this->load->view('main/topbar', $data);
      $employeeid = $this->ion_auth->user()->row()->employeeid;
      $data['viewReq'] = $this->Request_model->viewRequest($employeeid);
      $this->load->view('screeners/viewRequests', $data);
      $this->load->view('main/footer');
    }
}
