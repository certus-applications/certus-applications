<!DOCTYPE html>
<html lang="en">
<head>
  <title>Certus | Sign Up</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
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
    <div class="container-login100">
      <div class="wrap-login100">
        <form method="post" enctype="multipart/form-data" class="login100-form validate-form">
          <span class="login100-form-title p-b-34">
            Account Sign-Up
          </span>

          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
            <input id="first_name" class="input100" type="text" name="first_name" placeholder="First name">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
            <input id="last_name" class="input100" type="text" name="last_name" placeholder="Last name">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
            <input id="email" class="input100" type="email" name="email" placeholder="Eamil Address">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
            <input id="username" class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
            <input id="password" class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
            <input id="password_confirm" class="input100" type="password" name="password_confirm" placeholder="Confirm Password">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Sign Up
            </button>
          </div>

          <div class="w-full text-center p-t-27 p-b-239">
            <span class="txt1">
              <span style="color: red"><?php echo $this->session->flashdata('error_msg');?></span>
              <span style="color: red"><?php echo $this->session->flashdata('form_errors');?></span>
            </span>

            <a href="#" class="txt2">

            </a>
          </div>
        </form>

        <div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
      </div>
    </div>
  </div>



  <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <script>
    $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>
<!--===============================================================================================-->
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="../js/main.js"></script>

</body>
</html>