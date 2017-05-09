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

  public function can_login($user, $password)
  {
    $this->db->where('user', $user);
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
