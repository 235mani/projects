<?php 
  $session=session();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public/css/css_file.css'); ?> ">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>UtsavAalay</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--font awesome icons-->
<script src="https://kit.fontawesome.com/33c08b8109.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</style>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/images/logo_white.png');?>" />
</head>
<body style="background-color:;">
<div class="menu">
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <a href=""><img class="logo" src="<?php echo base_url('public/images/logo_white.png');?>"></a>         
        <a href="" class="navbar-brand" id="brand_name">UtsavAalay</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav ml-auto">
                       <li class="nav-item">
                            <a href="<?php echo base_url('home');?>" class="nav-link" id="nav_lists" >Home</a>
                            
                        </li>                

                        <li>
                            <a href="#footer" class="nav-link" id="nav_lists">ContactUs</a>
                        </li>
                          
                        <li class="nav-item dropdown ">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="nav_lists" style="color: yellow;">
                              <b >
                                <?php 
                                  $email = $session->get('email');
                                  echo strtok($email,"@");
                                ?>
                              </b></a>
                            <div class="dropdown-menu dropdown-menu-right " >
                                <a href="<?php echo base_url('home/user_profile');?>" class="dropdown-item active">
                                  <span >Profile</span>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a href="<?php echo base_url('home/my_orders');?>"  class="dropdown-item">
                                  <span>my Bookings</span>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a href="<?php echo base_url('home/s_destroy');?>" class="dropdown-item">
                                  <span>Logout</span>
                                </a>

                            </div>
                        </li>
                       
                    </ul>            
        </div>
    </nav>
</div>
    <div align="center" style="margin-top: 100px;background-color:orange;">
          <!-- <label class="alert alert-danger alert-dismissible fade show" > -->
            <!-- <a href="#" class="close" data-dismiss="alert">&times</a> -->
            <b>
              <?php echo \Config\Services::validation()->listErrors() ?>
            </b>
          <!-- </label> -->
    </div>
<div align="center" style="margin-bottom: 30px;">                
                <?php 
                if (isset($success_msg)) 
                {
                ?>
                  <label id="close_alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    <a href="#" class="close" data-dismiss="alert">&times</a>

                    <?php 
                        echo "<b class='alert-link'>".$success_msg."</b><br>";
                    ?>  
                  </label>
                <?php 
                }
                elseif (isset($fail_msg)) 
                {
                ?>
                  <label id="close_alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <a href="#" class="close" data-dismiss="alert">&times</a>

                    <?php 
                        echo "<b class='alert-link'>".$fail_msg."</b><br>";
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
                }elseif ($session->getTempdata('fail')) {
                ?>
                  <label id="close_alert" class="alert alert-danger alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert">&times</a>
                    <?php 
                        echo "<b>".$session->getTempdata('fail')."</b>";
                    ?>  
                  </label>                
                <?php
                }
                ?>
</div> 
<div class="content">  
        <div class="container" id="x">
          <div class="row">
            <div class="leftside " >
              <ul class="navbar-nav">       
                
                    <a  class="tablinks" onclick="openCity(event, 'profile')" id="defaultOpen"><li class="">Profile</li></a>

                    <a  class="tablinks" onclick="openCity(event, 'edit_profile')"><li class="">Edit Profile</li></a>
                    
                    <a  class="tablinks" onclick="openCity(event, 'change_pwd')"><li class="">Change Password</li></a>

<!--                     <a  class="tablinks" onclick="openCity(event, 'forget_pwd')" ><li class="">Forget Password</li></a>
 -->                    
                             
              </ul>
              
            </div>

            <div class="  rightside tabcontent" id="profile">
                      <table id="y" align=center>
                        <tr>
                        <td>Name </td> 
                        <td><input type="text" class="form-control" name="name" value="<?= $session->get('name')?>" readonly="readonly" placeholder="Fill Name" style='color:green'></td>
                        </tr>
                        
                        <tr>
                        <td>Email-Id </td>
                        <td><input type="mail" name="mail" size="30" class="form-control" value="<?= $session->get('email')?>" readonly="readonly" style='color:green'></td>
                        </tr>
                        
                        
                        <tr>
                        
                        <td>Address </td> 
                        <td><input type="text" name="add"  class="form-control" value="<?= $session->get('address')?>" readonly="readonly" size="30" placeholder="Fill Address" style='color:green'></td>
                        </tr>

                      </table>
                      

            </div> <!-- right div end -->

           
            <div class="  rightside tabcontent" id="edit_profile">
                    <form action="<?= base_url('home/edit_profile')?>" method="post">
                      <table id="y" align=center>
                        <tr>
                        <td>Name <span id="required">*</span></td> 
                        <td><input type="text" size="30" class="form-control" name="name_update" value="<?= $session->get('name')?>"  required placeholder="Fill name" style='color:green'></td>
                        </tr>        

                        
                        <tr>
                        <td>Email-Id <span id="required">*</span></td> 
                        <td><input type="email" name="email_update" size="30" class="form-control" value="<?= $session->get('email')?>"  required readonly style='color:green'></td>
                        </tr>
                        

                       
                        <tr>
                        <td>Address <span id="required">*</span></td> 
                        <td><input type="text" name="address_update"  class="form-control" value="<?= $session->get('address')?>"  size="30" placeholder="Full Address" required style='color:green'></td>
                        </tr>


                        <td colspan="2">
                          <input type="submit" name="update_submit" value="Update details" class="btn btn-success btn-block" >
                        </td>
                      </table>
                     </form>

            </div> <!-- right div end -->

            <div class="  rightside tabcontent" id="change_pwd">
                    <form action="<?= base_url('home/change_pwd_validate')?>" method="post">
                      <table id="y" align=center>
                        <tr>
                        <td>Old Password <span id="required">*</span></td> 
                        <td>
                          
                          <div class="form-group">
                                        <div class="input-group">
                                          <input class="form-control" ondrop="return false;" onpaste="return false;" placeholder="Enter Old Password" type="Password" required id="old-pwd" name="old_pwd">
                                          <!--
                                          <div class="input-group-append" onclick="signup_pwd()">
                                            <div class="input-group-text" id="signup-pwd-unhide"><i class="fa fa-eye" ></i></div>
                                            <div class="input-group-text" id="signup-pwd-hide"><i class="fa fa-eye-slash" ></i></div>
                                          </div>
                                        -->
                                        </div>

                                </div>
                        </td>
                        </tr>
                        <tr>
                        <td>New Password <span id="required">*</span></td> 
                        <td><input type="Password" size="30" class="form-control" name="new_pwd"   required placeholder="Enter New password"></td>
                        </tr>
                        <tr>
                        <td>Confirm New Password <span id="required">*</span></td> 
                        <td><input type="Password" name="confirm_pwd" size="30" class="form-control"  placeholder="Confirm New password" required></td>
                        </tr>
                        
                        <td >
                          <input type="submit" name="change_pwd" value="Change Password" class="btn btn-success btn-block">
                        </td>
                      </table>
                     </form>
            </div> <!-- right div end -->

            <div class="  rightside tabcontent" id="forget_pwd">
                          <form action="" method="post">
                          <table id="y" align=center>
                            <tr>
                            <td>Mobile Number</td> 
                            <td><input type="text" size="30" class="form-control" name="name" value="7075404805"  readonly="readonly"></td>
                            </tr>
                            <tr>
                            <td>OTP</td> 
                            <td><input type="text" size="30" class="form-control" name="uname" placeholder="xx-xx-xx"  required></td>
                            </tr>
                            
                            
                            <td >
                              <input type="submit" name="submit" value="Get OTP" class="btn btn-success btn-block btn-sm">
                            </td>
                            
                          </table>
                         </form>

            </div> <!-- right div end -->


          </div>
        </div>
</div>


<div class="footer" id="footer">  
<?php 
  include 'footer.html';
 ?>
</div>


<script type="text/javascript" src=" <?php echo base_url('public/js/script.js'); ?> "></script>

</body>
</html>                            