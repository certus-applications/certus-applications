<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct() {
      parent::__construct();

      if (!$this->ion_auth->logged_in()) {
        redirect('auth/login', 'refresh');
      }
    }

    public function index(){
      $this->load->model('Schedule_model');

      if ($this->ion_auth->is_admin()) {
        $data["userRole"] = "ADMIN";
        $data["options"] = ["Sync Data", "Create User", "Edit Users", "Change Password", "Logout"];
        $data["href"] = ["data", "auth/create_user", "auth", "auth/change_password", "auth/logout"];
        $data["font"] = ["database","user-plus", "edit", "refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Billing", "Insights", "Activity", "Reminders"];
        $data["link"] = ["main/index", "screeners", "billing", "insights", "activity", "reminders"];
        $data["icon"] = ["calendar","user", "usd", "bar-chart", "bookmark-o", "check-square-o"];

        $scheduleData['scheduleView'] = $this->Schedule_model->getSchedule();

        if ($this->input->is_ajax_request()) {
          echo json_encode($scheduleData);
          exit;
        }
          
      } elseif ($this->ion_auth->in_group("hostpial admin")) {
        $data["userRole"] = "HOSPITAL ADMIN";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["refresh", "sign-out"];

        $data["sideMenu"] = ["Calendar", "Screeners", "Billing", "Insights", "Activity", "Reminders"];
        $data["link"] = ["main/index", "screeners", "billing", "insights", "activity", "reminders"];
        $data["icon"] = ["calendar","user", "usd", "bar-chart", "bookmark-o", "check-square-o"];    

        $scheduleData['scheduleView'] = $this->Schedule_model->getSchedule();

        if ($this->input->is_ajax_request()) {
          echo json_encode($scheduleData);
          exit;
        } 
      } else {
        $data["userRole"] = "SCREENER";
        $data["options"] = ["Logout"];
        $data["href"] = ["auth/logout"];
        $data["font"] = ["sign-out"];

        $data["sideMenu"] = ["Calendar", "Add Availability"];
        $data["link"] = ["main/index", "screeners/add"];
        $data["icon"] = ["calendar","user"];

        $employeeid = $this->ion_auth->user()->row()->employeeid;
        $screenerScheduleData['scheduleViewScreener'] = $this->Schedule_model->getScheduleScreener($employeeid);

        if ($this->input->is_ajax_request()) {
          echo json_encode($screenerScheduleData);
          exit;
        }
      }

      $data["userFirstName"] = $this->ion_auth->user()->row()->first_name;
      $data["userLastName"] = $this->ion_auth->user()->row()->last_name;
              
     //$data['eventsAll'] = $this->Events_model->listAll();
      $this->load->view('main/header');
      $this->load->view('main/sidebar', $data);
      $this->load->view('main/topbar', $data);
      $this->load->view('calendar/view');
      $this->load->view('main/footer');
    }

    public function saveEvent() {
      $this->output->set_content_type('application/json');
      echo json_encode(array('check' => 'Ajax successful'));
    }

}
