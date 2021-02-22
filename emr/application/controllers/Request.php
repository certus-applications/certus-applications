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
        $data["link"] = ["main/index", "screeners", "locations", "request/view"];
        $data["icon"] = ["calendar","user", "building", "exclamation-triangle"];    
      } elseif ($this->ion_auth->in_group("hostpial admin")) {
        $data["userRole"] = "HOSPITAL ADMIN";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Buildings", "Requests"];
        $data["link"] = ["main/index", "screeners", "locations", "request/view"];
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
      $firstName = $this->ion_auth->user()->row()->first_name;
      $lastName = $this->ion_auth->user()->row()->last_name;
      $this->load->model('Schedule_model');
      $data['screenerSche'] = $this->Schedule_model->getScheduleScreener($firstName, $lastName);

      // Week 1 and week 2 timespan
      $day = date('w'); 
      $week_2start = date('m/j/Y', strtotime('+'.(7-$day).' days'));
      $week_2end = date('m/j/Y', strtotime('+'.(13-$day).' days'));

      // Getting individual dates for each day
      $datesArr = array();
      for($i = 0;  $i < 7; $i++) {
        $date = date('m/j/Y', strtotime("$week_2start + $i days"));
        $datesArr[] = $date;
      }

      $data['week_2start'] = $week_2start;
      $data['week_2end'] = $week_2end;
      $data['datesArr'] = $datesArr;
      // $data['screenerSche'] = $this->Schedule_model->getScheduleScreener($employeeid);

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
      $timeoff_type1 = $this->input->post('timeoffType1');
      $timeoff_type2 = $this->input->post('timeoffType2');
      $new_dates = $this->input->post('dates');
      $shifts = $this->input->post('shift_date');
      
      
      if ($new_dates != null) {
        $date = json_encode($new_dates);
        $timeoff_type = $timeoff_type2;
      } else {
        $date = NULL;
        $timeoff_type = $timeoff_type1;
      }

      if ($shifts != null) {
        $shift = json_encode($shifts);
      } else {
        $shift = [];
      }


      $request = array(
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'timestamp' => date('Y-m-d H:i:s'),
        'employeeid' => $data['employeeid'],
        'timeoff_type' => $timeoff_type,
        'updated_start_req' => $date,
        'timeoff_shift' => $shift,
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

        $dates = $this->input->post('timeoff_date');
        if ($dates != null) {
          $date = $dates;
        } else {
          $date = [];
        }

        for ($i=0; $i < sizeof($date); $i++){
          $my_dt = new DateTime($date[$i]);
          // $expires_at = $my_dt->modify(' +8 hour');
          $send_date = $my_dt->format('Y-m-d H:i:s');
          // $employeeid = $this->input->post('employeeid');

          // Using first and last name to delete from schedule
          $firstName = $this->input->post('firstname');
          $lastName = $this->input->post('lastname');

          $this->load->model('Schedule_model');
          $this->Schedule_model->deleteSchedule($firstName, $lastName, $send_date);
        }      
        $this->Request_model->updateRequest($update_req);
        return redirect('request/view');

      } else {
        $update_req = array (
          'id' => $this->input->post('id'),
          'approved' => FALSE
        );
        $this->Request_model->updateRequest($update_req);
        return redirect('request/view', 'refresh');
      }

    }

    // View Requests
    public function view(){
      $this->load->model('Availability_model');
      if ($this->ion_auth->is_admin()) {
        $data["userRole"] = "ADMIN";
        $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
        $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
        $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Locations", "Requests"];
        $data["link"] = ["main/index", "screeners", "locations", "request/view"];
        $data["icon"] = ["calendar","user", "building", "exclamation-triangle"];  
        
        $data['avail'] = $this->Request_model->getAvailability();
      } elseif ($this->ion_auth->in_group("hostpial admin")) {
        $data["userRole"] = "HOSPITAL ADMIN";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Locations", "Requests"];
        $data["link"] = ["main/index", "screeners", "locations", "request/view"];
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
      
      $employeeid = $this->ion_auth->user()->row()->employeeid;
      $this->load->model('Schedule_model');
      $data['screenerSche'] = $this->Schedule_model->getSchedule();
      $data['viewReq'] = $this->Request_model->viewRequest($employeeid);


      $this->load->view('main/header');
      $this->load->view('main/sidebar', $data);
      $this->load->view('main/topbar', $data);
      $this->load->view('requests/view', $data);
      $this->load->view('main/footer');
    }
}
