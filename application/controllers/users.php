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
    $this->form_validation->set_rules('user_name','user_name','required');
    $this->form_validation->set_rules('password','password','required');
    if ($this->form_validation->run())
    {
      $user_name = $this->input->post('user_name');
      $password = $this->input->post('password');
      // model function
      $this->load->model('model_users');
      if ($this->model_users->can_login($user_name,$password)) {
        /// stores user in session
        $session_data = array(
          'user_name'=> $user_name
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

  /*
     * User registration
     */
  public function user_registration(){
      $data = array();
      $userData = array();
      if($this->input->post('regisSubmit')){
          $this->form_validation->set_rules('user_name', 'user_name', 'required');
          //$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
          $this->form_validation->set_rules('password', 'password', 'required');
          $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

          // to hash the password use md5($this->input->post('password'))
          $userData = array(
              'user_name' => strip_tags($this->input->post('user_name')),
              //'email' => strip_tags($this->input->post('email')),
              'password' => $this->input->post('password'),
              //'gender' => $this->input->post('gender'),
              //'phone' => strip_tags($this->input->post('phone'))
          );

          if($this->form_validation->run() == true){
              $insert = $this->db->insert('users',$userData);
              if($insert){
                  $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                  $this->load->view('homepage');
              }else{
                  $data['error_msg'] = 'Some problems occured, please try again.';
              }
          }
      }
      $data['user_name'] = $userData;
      //load the view
      $this->load->view('homepage', $data);
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
