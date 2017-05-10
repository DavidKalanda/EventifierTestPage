<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
  </head>
  <body>
    <?php echo form_open('users/login_validation'); ?>
    <div class="container">
    <label><b>Email</b></label><br />
    <input type="text" placeholder="Enter Email" name="email" required>
    <br /><br />
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br /><br />
    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <br /><br />
    <input type="checkbox" checked="checked"> Remember me
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button"  class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
  </body>
</html>
