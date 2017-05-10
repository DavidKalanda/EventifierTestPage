<?php
class model_users extends CI_Model{

  public function __construct(){
    $this->load->database();
  }
  // gets all the users
  public function all_users()
  {
    $query = $this->db->get('users');
    return $query->result_array();
  }

  // Checks the database to see if the user exists
  public function can_login($user_name, $password)
  {
    $this->db->where('user_name', $user_name);
    $this->db->where('password', $password);
    $query = $this->db->get('users');

    if($query->num_rows() > 0)
    {
      return true;
    }
    else {
      return false;
    }
  }



}

 ?>
