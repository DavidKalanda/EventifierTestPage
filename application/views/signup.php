<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div class="container">
    <h2>User Registration</h2>
    <?php echo form_open('users/user_registration'); ?>
        <div class="form-group">
            <input type="text" class="form-control" name="user_name" placeholder="Name" required="" value="<?php echo !empty($user_name['user_name'])?$user_name['user_name']:''; ?>">
          <?php echo form_error('user_name','<span class="help-block">','</span>'); ?>
        </div>
        <!-- <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
          <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div> -->
        <!-- <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
        </div> -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
          <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <?php
            if(!empty($user['gender']) && $user['gender'] == 'Female'){
                $fcheck = 'checked="checked"';
                $mcheck = '';
            }else{
                $mcheck = 'checked="checked"';
                $fcheck = '';
            }
            ?>
        </div>
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn-primary" value="Submit"/>
        </div>
    </form>
    <p class="footInfo">Already have an account? </p>
</div>
</body>
</html>
