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
    $this->load->view("welcome_message", $data);
  }

  public function login_validation(){
    $this->load->library('form_validation');
    $this->form_validation->setrules('user','user','required');
    $this->form_validation->setrules('password','password','required');
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
        //complete with redirect location next page
        redirect('http://localhost/Test/views/homepage');
        }
        else {
        $this->session->set_flashdata('error','Invalid username and password');
        //complete with redirect to login page
        redirect('http://localhost/Test/user/login');
      }
    }
    else {
      //false
      $this->login();
    }
  }

  // IF user enters right data
  public function enter(){
    if ($this->session->userdata('user') != '') {
      echo '<h2>Welcome - ' .$this->session->userdata('user') . '</h2>';
    }
    else {
      redirect('http://localhost/Test/homepage');
    }
  }


}

?>
