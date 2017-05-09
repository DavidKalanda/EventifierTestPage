<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// put data into the database
  //  $query = $this->db->query("SELECT * FROM users");
  //
	//  $data = array(
  //  'user_name' => 'test',
  //  'password' => 'test'
//);
//$this->db->insert("users", $data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?> to Eventifier</title>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="/Test/public/welcomepage.css"> -->
</head>
<body>
  <h1>Login</h1>
  <div class="container">
    <br /><br /><br />
    <?php echo form_open('user/login_validation'); ?>
      <label>Enter Username</label>
      <input type="text" name="user" value=""/>
      <br /><br />
      <div class="">
        <label>Enter Password</label>
        <input type="text" name="password" value=""/>
      </div>
      <br /><br />
      <div class="">
        <input type="submit" name="insert" value="Login">
        <?php echo $this->session->flashdata("error"); ?>
      </div>
    </form>
  </div>

</body>
</html>
