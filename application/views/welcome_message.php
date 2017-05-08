<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   $query = $this->db->query("SELECT * FROM users");

	 $data = array(
   'user_name' => 'test',
   'password' => 'test'
);

$this->db->insert("users", $data);

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome blablabla Eventifier</title>

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/Public/welcomepage.css">

  <!-- /*<style type="text/css">
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	</style>*/ -->

</head>
<body>

  <div class="container">
      <div class="row">
          <div class="col-md-offset-5 col-md-3">
              <div class="form-login">
              <h4>Welcome back.</h4>
              <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" />
              </br>
              <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
              </br>
              <div class="wrapper">
              <span class="group-btn">
                  <a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
              </span>
              </div>
              </div>

          </div>
      </div>
  </div>

</body>
</html>
