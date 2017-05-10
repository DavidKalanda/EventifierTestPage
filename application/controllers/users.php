<?php
defined('BASEPATH') OR Exit ('No direct script access allowed');

class Users extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('model_users');
    $this->load->helper("form");

  }

  // public function start_session(){
  //   $this->load->library('session');
  // }

  public function index(){
    $data['title']= 'Welcome Boi!';
    $this->load->helper("form");
    $this->load->helper('url');
    $this->load->view("welcome_message", $data);

  }

  // Validates the login information
  public function login_validation(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('user','user','required');
    $this->form_validation->set_rules('password','password','required');
    if ($this->form_validation->run())
    {
      $user = $this->input->post('user');
      $password = $this->input->post('password');
      // model function
      $this->load->model('model_users');
      if ($this->model_users->can_login($user,$password)) {
        /// stores user in session
        $session_data = array(
          'user'=> $user
        );
        $this->session->set_userdata($session_data);
        //complete with redirect location homepage
        $this->load->view('homepage');
        //redirect(base_url() . 'views/homepage');
        }
        else {
        $this->session->set_flashdata('error','Invalid username and password');
        //complete with redirect to login page
        $this->load->view('welcome_message');
        //redirect('http://localhost/Test/user/welcome_message');
      }
    }
    else {
      //false
      $this->login();
    }
  }
  // Opens signup page when link is clicked
  public function signup()
  {
    $this->load->view('signup');
  }

  // Validate and store registration data in database
public function new_user_registration()
{
  // Check validation for user input in SignUp form
  $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
  $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
  if ($this->form_validation->run() == FALSE) {
  $this->load->view('registration_form');
  } else {
    $data = array(
    'user_name' => $this->input->post('username'),
    'user_email' => $this->input->post('email_value'),
    'user_password' => $this->input->post('password')
    );
    $result = $this->login_database->registration_insert($data);
    if ($result == TRUE) {
    $data['message_display'] = 'Registration Successfully !';
    $this->load->view('login_form', $data);
    } else {
    $data['message_display'] = 'Username already exist!';
    $this->load->view('registration_form', $data);
    }
  }
}



  // IF user enters right data
  // public function enter(){
  //   if ($this->session->userdata('user') != '') {
  //     echo '<h2>Welcome - ' .$this->session->userdata('user') . '</h2>';
  //   }
  //   else {
  //     redirect(base_url() . 'views/homepage');
  //   }
  // }



}

?>
