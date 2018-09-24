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

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Certus</title>
  
  
  <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

      <link rel="stylesheet" href="../../../css_login/style.css">

  
</head>

<center><body>

  <div class='brand'>
    <img src='../../../img/rsz_1certuslogowatermark.png'>
</div>

<?php echo form_open("auth/login");?> 
<div class='login'>
  
  <div class='login_title'>
    <span><h1><?php echo lang('login_heading');?></h1></span>
  </div>

   
  <div class='login_fields'>
    
    <div class='login_fields__user'>
        Username
        <?php echo form_input($identity);?>
    </div>

    <div class='login_fields__password'>
        Password
        <?php echo form_input($password);?>
    </div>

    <div class='login_fields__submit'>
      <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>
      <div class='forgot'>
        <a href='#'>Forgotten password?</a>
      </div>
    </div>
  </div>
</div>
<?php echo form_close();?>


    <script  src="../../../js_login/index.js"></script>




</body></center>

</html>
