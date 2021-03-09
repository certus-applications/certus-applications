<!-- <h1><?php echo lang('change_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/change_password");?>

      <p>
            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </p>

      <p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

<?php echo form_close();?>
 -->

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>MGH</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../img/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="../css/util_login.css">
  <link rel="stylesheet" type="text/css" href="../css/main_login.css">
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('../img/bg-01.png');">
      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          <?php echo lang('change_password_heading') ?>
          <div id="infoMessage"><?php echo $message;?></div>
        </span>
        <!-- CREATING CHANGE PASSWORD FORM  -->
          <?php echo form_open("auth/change_password", 'class="login100-form validate-form p-b-33 p-t-5"');?>
            <!-- Old Password Box -->
            <div class="wrap-input100 validate-input">
              <?php echo form_input($old_password);?>
              <span class="focus-input100" data-placeholder="&#xe863;"></span>
            </div>
            <!-- New Password Box -->
            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <?php echo form_input($new_password);?>
              <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>
            <!-- Confirm Password Box -->
            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <?php echo form_input($new_password_confirm);?>
              <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>
            <!-- Submit Button -->
            <div class="container-login100-form-btn m-t-32">
                <?php
                  $data = [
                    'class' => 'login100-form-btn',
                    'value' => 'change_password',
                    'type' => 'submit',
                    'name' => 'submit',
                    'content' => 'Change'
                  ]; 
                  echo form_button($data);
                ?>
            </div>
          <?php echo form_close();?>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="../vendor/animsition/js/animsition.min.js"></script>
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>\
  <script src="../vendor/select2/select2.min.js"></script>\
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
  <script src="../vendor/countdowntime/countdowntime.js"></script>
  <script src="../js/main.js"></script>

</body>
</html>