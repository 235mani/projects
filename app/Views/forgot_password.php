<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>PASSWORD RECOVERY</title>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public/css/css_file.css'); ?> ">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/33c08b8109.js" crossorigin="anonymous"></script>


<style type="text/css">
  
#forgot_password_form{
  width:300px;
}  
.menu{
  padding-bottom: 120px;
}
</style>


<script type="text/javascript">

function new_password() {
  var new_password_field = document.getElementById("new_password_field");
  var new_password_unhide = document.getElementById("new_password_unhide");
  var new_password_hide = document.getElementById("new_password_hide");

  if (new_password_field.type == "password") {
    new_password_field.type = "text";
    new_password_unhide.style.display="none";
    new_password_hide.style.display="block";

  } else {
    new_password_field.type = "password";
    new_password_unhide.style.display="block";
    new_password_hide.style.display="none";    

  }  
}
 

function confirm_password() {
  var confirm_password_field = document.getElementById("confirm_password_field");
  var confirm_password_unhide = document.getElementById("confirm_password_unhide");
  var confirm_password_hide = document.getElementById("confirm_password_hide");

  if (confirm_password_field.type == "password") {
    confirm_password_field.type = "text";
    confirm_password_unhide.style.display="none";
    confirm_password_hide.style.display="block";

  } else {
    confirm_password_field.type = "password";
    confirm_password_unhide.style.display="block";
    confirm_password_hide.style.display="none";    

  }  
}  

</script>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/images/logo_white.png');?>" />
</head>
<body>
<div class="menu">
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <a href=""><img class="logo" src="<?php echo base_url('public/images/logo_white.png');?>"></a>         
        <a href="" class="navbar-brand" id="brand_name">BlueCarpt</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        </button>
    </nav>

</div>

<div style="margin-bottom:40px;" align="center">
                <?php 
                if ($session->getTempdata('fail')) {
                ?>
                  <label id="close_alert" class="alert alert-danger alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert">&times</a>
                    <?php 
                        echo "<b>".$session->getTempdata('fail')."</b>";
                    ?>  
                  </label>                
                <?php
                }elseif ($session->getTempdata('success')) {
                ?>
                  <label id="close_alert" class="alert alert-success alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert">&times</a>
                    <?php 
                        echo "<b>".$session->getTempdata('success')."</b>";
                    ?>  
                  </label>                
                <?php
                }elseif (isset($fail)) {
                ?>
                  <label id="close_alert" class="alert alert-success alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert">&times</a>
                    <?php 
                        echo "<b>".$fail."</b>";
                    ?>  
                  </label>                
                <?php
                }
                ?>
</div>

<?php
if (isset($error)) {
?>
<div align="center">
  <label class="alert alert-danger alert-dismissible fade show">
    <a href="#" class="close" data-dismiss="alert">&times</a>
    <?php 
        echo "<b>".$error."</b>"; 
    ?>  
  </label><br>
  <?php 
      echo "<a href='".base_url()."'><i class='fas fa-arrow-alt-circle-left'></i> Go to home page</a>"; 
  ?>   
</div>             
<?php
}else{
?>
<center>
   
    <div id="forgot_password_form">
       <h4>CHANGE PASSWORD</h4>
       <hr>
      <form action="<?= base_url('Home/verify_recovery')?>" method="post"  >
          
          <input type="hidden" name="user_id" value="<?= $user_id?>">
  
          <div class="div-input">
                <i class="fas fa-key" id="login-icon"><span id="required">*</span></i>
                <input class="login-inp" ondrop="return false;" onpaste="return false;" placeholder="New Password" type="Password" required="" id="new_password_field" name="new_password_field" >

                <div class="input-group-append" onclick="new_password()">
                  <div class="login-inp" id="new_password_unhide" 
                  ><i class="fa fa-eye" id="login-icon"></i></div>
                  <div class="login-inp" id="new_password_hide" style="display:none; "><i class="fa fa-eye-slash" id="login-icon"></i></div>
                </div>
          </div>

          <div class="div-input">
                <i class="fas fa-key" id="login-icon"><span id="required">*</span></i>
                <input class="login-inp" ondrop="return false;" onpaste="return false;" placeholder="Confirm Password" type="Password" required="" id="confirm_password_field" name="confirm_password_field" >

                <div class="input-group-append" onclick="confirm_password()">
                  <div class="login-inp" id="confirm_password_unhide" 
                  ><i class="fa fa-eye" id="login-icon"></i></div>
                  <div class="login-inp" id="confirm_password_hide" style="display:none; "><i class="fa fa-eye-slash" id="login-icon"></i></div>
                </div>
          </div>      

          <input type="submit" name="forgot_password_submit" class="btn btn-sm btn-block" id="forget_verify_submit">
    </form>
  </div>
</center>
<?php
}
?>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>