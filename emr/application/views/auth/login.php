<!-- OLD CODE

<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

-->



<html lang="en">
<head>
  <title>Certus</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="../../../img/rsz_1certuslogowatermark.png"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../css_login/util.css">
  <link rel="stylesheet" type="text/css" href="../../../css_login/main.css">
<!--===============================================================================================-->
</head>
<body>

  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('../../../img/bg-02.jpg');">
      <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

        <?php echo form_open("auth/login");?>
        <form class="login100-form validate-form flex-sb flex-w">
          <span class="login100-form-title p-b-53">
            <h1><?php echo lang('login_heading');?></h1>
            <p><?php echo lang('login_subheading');?></p>
          </span>


          <!-- Username -->
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              <?php echo lang('login_identity_label', 'identity');?>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Username is required" style='text-align: center; background-color: white; border: solid 4px grey;border-radius: 20px;'>
            <?php echo form_input($identity);?>
            <span class="focus-input100"></span>
          </div>


          <!-- Password -->
          <div class="p-t-13 p-b-9">
            <span class="txt1">
              <?php echo lang('login_password_label', 'password');?>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Password is required" style='text-align: center; background-color: white; border: solid 4px grey;border-radius: 20px;'>
            <?php echo form_input($password);?>
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn">
              Sign In
              <?php echo form_submit('submit');?>
            </button>
          </div>

          <div class="w-full text-center p-t-55">

            <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

            <br>

            <span class="txt2">
              Not a member?
            </span>
            <a href="#" class="txt2 bo1">
              Sign up now
            </a>

          </div>
        </form>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="../../../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../../../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../../../vendor/bootstrap/js/popper.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../../../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../../../vendor/daterangepicker/moment.min.js"></script>
  <script src="../../../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../../../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="../../../js_login/main.js"></script>

</body>
</html>