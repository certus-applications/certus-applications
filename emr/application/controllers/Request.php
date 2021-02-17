<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
    public function __construct() {
      parent::__construct();

      if (!$this->ion_auth->logged_in()) {
        redirect('auth/login', 'refresh');
      }
    }

    // Screeners view
    public function index(){
      if ($this->ion_auth->is_admin()) {
        $data["userRole"] = "ADMIN";
        $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
        $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
        $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
        $data["link"] = ["main/index", "screeners", "billing", "request/view"];
        $data["icon"] = ["calendar","user", "building", "exclamation-triangle"];    
      } elseif ($this->ion_auth->in_group("hostpial admin")) {
        $data["userRole"] = "HOSPITAL ADMIN";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
        $data["link"] = ["main/index", "screeners", "billing", "request/view"];
        $data["icon"] = ["calendar","user", "building", "exclamation-triangle"];   
      } else {
        $data["userRole"] = "SCREENER";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["sign-out"];

        $data["sideMenu"] = ["Calendar", "Availability", "My Requests"];
        $data["link"] = ["main/index", "screeners/add", "request/view"];
        $data["icon"] = ["calendar","user", "check-square-o"];
      }

      $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
      $data["userLastName"] = $this->ion_auth->user()->row()->last_name;

      $employeeid = $this->ion_auth->user()->row()->employeeid;
      $this->load->model('Schedule_model');
      $data['screenerSche'] = $this->Schedule_model->getScheduleScreener($employeeid);

      $this->load->view('main/header');
      $this->load->view('main/sidebar', $data);
      $this->load->view('main/topbar', $data);
      $this->load->view('screeners/request', $data);
      $this->load->view('main/footer');
    }

    // Screeners Add
    public function add() {
      // User info to send to database
      $data['first_name'] = $this->ion_auth->user()->row()->first_name;
      $data['last_name'] = $this->ion_auth->user()->row()->last_name;
      $data['employeeid'] = $this->ion_auth->user()->row()->employeeid;  

      $type = $this->input->post('timeoff_type');
      $text = $this->input->post('other-text');
      $start = $this->input->post('start_date');
      $end = $this->input->post('end_date');
      $timeoff_type = $this->input->post('timeoffType');
      $selected_day = $this->input->post('update_time');

      if (empty($end)) {
        $end = $start;
      }

      if (empty($selected_day)) {
        $selected_day = NULL;
      }

      $request = array(
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'timestamp' => date('Y-m-d H:i:s'),
        'employeeid' => $data['employeeid'],
        'timeoff_type' => $timeoff_type,
        'requested_date_timeoff' => $selected_day,
        'start' => date('Y-m-d', strtotime ($start)),
        'end' => date('Y-m-d', strtotime ($end)),
        'reason' => $type.' '.$text
      );


      $this->Request_model->addRequest($request);

      return redirect('request', 'refresh');
    }

    // Admin update
    public function update() {
      $choice = $this->input->post('choice');

      if($choice == 'Approve') {
        $update_req = array (
          'id' => $this->input->post('id'),
          'approved' => TRUE
        );
        $this->Request_model->updateRequest($update_req);
        echo "
                <script type='text/javascript'>
                    $(document).ready(function(e) {
                        notifyUser('approved');
                    });
                </script>";
        return redirect('request/screener_requests');
      } else{
        $update_req = array (
          'id' => $this->input->post('id'),
          'approved' => FALSE
        );
        $this->Request_model->updateRequest($update_req);
        echo "
                <script type='text/javascript'>
                    $(document).ready(function(e) {
                        notifyUser('declined');
                    });
                </script>";
        return redirect('request/screener_requests', 'refresh');
      }

    }

    // View Requests (Screeners)
    public function view(){
      $this->load->model('Availability_model');
      if ($this->ion_auth->is_admin()) {
        $data["userRole"] = "ADMIN";
        $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
        $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
        $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
        $data["link"] = ["main/index", "screeners", "billing", "request/view"];
        $data["icon"] = ["calendar","user", "building", "exclamation-triangle"];  
        
        $data['avail'] = $this->Request_model->getAvailability();
      } elseif ($this->ion_auth->in_group("hostpial admin")) {
        $data["userRole"] = "HOSPITAL ADMIN";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
        $data["link"] = ["main/index", "screeners", "billing", "request/view"];
        $data["icon"] = ["calendar","user", "building", "exclamation-triangle"];   

        $data['avail'] = $this->Request_model->getAvailability();
      } else {
        $data["userRole"] = "SCREENER";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["sign-out"];

        $data["sideMenu"] = ["Calendar", "Availability", "My Requests"];
        $data["link"] = ["main/index", "screeners/add", "request/view"];
        $data["icon"] = ["calendar","user", "check-square-o"];;
      }

      $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
      $data["userLastName"] = $this->ion_auth->user()->row()->last_name;

      $this->load->view('main/header');
      $this->load->view('main/sidebar', $data);
      $this->load->view('main/topbar', $data);
      $employeeid = $this->ion_auth->user()->row()->employeeid;
      $data['viewReq'] = $this->Request_model->viewRequest($employeeid);
      $this->load->view('requests/view', $data);
      $this->load->view('main/footer');
    }

    // View Requests (Admin)
  //   public function screener_requests(){
  //     $this->load->model('Screeners_model');

  //     if ($this->ion_auth->is_admin()) {
  //       $data["userRole"] = "ADMIN";
  //       $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
  //       $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
  //       $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];

  //       $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
  //       $data["link"] = ["main/index", "screeners", "billing", "request/view"];
  //       $data["icon"] = ["calendar","user", "building", "exclamation-triangle"];    
  //     } elseif ($this->ion_auth->in_group("hostpial admin")) {
  //       $data["userRole"] = "HOSPITAL ADMIN";
  //       $data["options"] = ["Logout"];
  //       $data["href"] = ["auth/logout"];
  //       $data["font"] = ["refresh", "sign-out"];

  //       $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
  //       $data["link"] = ["main/index", "screeners", "billing", "request/screener_requests"];
  //       $data["icon"] = ["calendar","user", "building", "exclamation-triangle"];  
  //     } else {
  //       $data["userRole"] = "SCREENER";
  //       $data["options"] = ["Logout"];
  //       $data["href"] = ["auth/logout"];
  //       $data["font"] = ["sign-out"];

  //       $data["sideMenu"] = ["Calendar", "Availability", "Request"];
  //       $data["link"] = ["main/index", "screeners/add", "screeners/request"];
  //       $data["icon"] = ["calendar","user", "exclamation-triangle"];
  //     }
      
  //     $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
  //     $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
  //     $this->load->view('main/header');
  //     $this->load->view('main/sidebar', $data);
  //     $this->load->view('main/topbar', $data);
  //     $data['avail'] = $this->Request_model->getAvailability();
  //     $this->load->view('requests/main', $data);
  //     $this->load->view('main/footer');
  // }
}
