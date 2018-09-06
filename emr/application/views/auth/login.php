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
  <link rel="icon" type="image/png" href="../../../img/icons/rsz_1certuslogowatermark.png"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor_login/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor_login/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../../../vendor_login/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor_login/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../css_login/util.css">
  <link rel="stylesheet" type="text/css" href="../../../css_login/main.css">
<!--===============================================================================================-->
</head>
<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="../../../img/certus_logo.png" alt="IMG">
        </div>

        <?php echo form_open("auth/login");?>
        <form class="login100-form validate-form">
          <span class="login100-form-title">
            Member Login
          </span>

       
          <?php echo form_open("auth/login");?>
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <?php echo lang('login_identity_label', 'identity');?>
              <?php echo form_input($identity);?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <?php echo lang('login_password_label', 'password');?>
              <?php echo form_input($password);?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100">
            <?php echo lang('login_remember_label', 'remember');?>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
              <?php echo form_submit('submit');?>
            </button>
          </div>

          <div class="text-center p-t-12">
            <a class="txt2" href="forogt_password">
              Forgot your password?
            </a>
          </div>
        </form>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
  

  

  
<!--===============================================================================================-->  
  <script src="../../../vendor_login/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../../../vendor_login/bootstrap/js/popper.js"></script>
  <script src="../../../vendor_login/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../../../vendor_login/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../../../vendor_login/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="../../../js_login/main.js"></script>

</body>
</html>