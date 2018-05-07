<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index() {
    $this->form_validation->set_rules('username', "Username", 'trim|required|max_length[32]');
    $this->form_validation->set_rules('password', "Password", 'trim|required|min_length[5]');

    if ($this->form_validation->run()) {
      $loginData = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
      );

      $loginUserData = $this->Users->login_user($loginData['username'],$loginData['password']);

        if($loginUserData){
          $this->session->set_userdata($loginUserData);

          $this->load->view('chatbot');
        } else {
          $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
          redirect('/login', 'refresh');
        }

    } else {
        $this->load->view('login');
        // echo validation_errors();
        if (validation_errors()) {
          $this->session->set_flashdata('form_errors', validation_errors());
          redirect('/login', 'refresh');
          echo validation_errors();
        }
    }

    // $this->load->view('login');



  }

  public function signup(){

    $this->form_validation->set_rules('first_name', "First Name", 'trim|required');
    $this->form_validation->set_rules('last_name', "Last Name", 'trim|required');
    $this->form_validation->set_rules('email', "Email", 'trim|required|valid_email');
    $this->form_validation->set_rules('username', "Username", 'trim|required|max_length[32]');
    $this->form_validation->set_rules('password', "Password", 'trim|required|min_length[5]');
    $this->form_validation->set_rules('password_confirm', "Password Confirm", 'trim|required|matches[password]');

    if ($this->form_validation->run()) {
    //Setting values for tabel columns
    $userData = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'email' => $this->input->post('email'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password')
      );

    $email_check = $this->Users->email_check($userData['email']);

      if($email_check){
        //Transfering data to Model
        $this->Users->addUser($userData);
        $this->session->set_flashdata('success_msg', 'Successfully Registered! You may now login to your account.');
        redirect('login');
      } else {
        $this->session->set_flashdata('error_msg', 'Email already exists. Please try again!');
        redirect('/login/signup', 'refresh');
      }
    } else {
        $this->load->view('signup');
        // echo validation_errors();
        if (validation_errors()) {
          $this->session->set_flashdata('form_errors', validation_errors());
          redirect('/login/signup', 'refresh');
        }
    }
  }

  public function loginUser(){
    $userLogin = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password')
    );

    $data = $this->Users->login_user($userLogin['username'],$userLogin['password']);

    if($data){
      echo "scandir";
    } else {
      echo "string";
    }
  }
}
