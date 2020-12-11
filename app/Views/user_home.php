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




<style type="text/css">
.search{
  padding-top: 100px;

}



</style>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/images/logo_white.png');?>" />
</head>

<body style="background-color:;">
<?php 
//include_once("header.php");
 ?>
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
                            <a href="<?php echo base_url('home');?>" class="nav-link" id="nav_lists" >
                              <b style="color: yellow;">Home</b>
                            </a>
                            
                        </li>

                        <li class="nav-item dropdown">
                            <!--level 1 drop dowm-->
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="nav_lists">We Support</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a tabindex="-1" href="#" class="dropdown-item dropdown-toggle" id="item1" data-toggle="dropdown">College events</a>
                                <!--level 2.1 drop dowm-->
                                        <div class="dropdown-menu dropdown-menu " id="level_1in2_drop">
                                            <a href="#"class="dropdown-item">Fest</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#"class="dropdown-item">MUN</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="#"class="dropdown-item">Cultural Events</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="#"class="dropdown-item">DJ Events</a>
                                     
                                        </div>  
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-toggle" id="item2" data-toggle="dropdown">Other events</a>
                                <!--level 2.1 drop dowm-->
                                        <div class="dropdown-menu dropdown-menu " id="level_2in2_drop">
                                            <a href="#"class="dropdown-item">holi fest</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#"class="dropdown-item">Kite Festival</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="#"class="dropdown-item">Dandia</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="#"class="dropdown-item">Dussera Events</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="#"class="dropdown-item">Eco-friendly Events</a>
                                        </div>

                               
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="nav_lists">
                              <b class="">Our Services</b></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="" class="dropdown-item" style="cursor:not-allowed;">
                                  <span >Banqute halls</span></a>
                                <div class="dropdown-divider"></div>

                                <a href="<?=base_url('home/function_hall')?>" style="cursor: pointer;" class="dropdown-item">
                                  <b class="">Function halls</b></a>
                                <div class="dropdown-divider"></div>
                                
                                <a href="<?=base_url('home/convention_hall')?>" style="cursor: pointer;" class="dropdown-item"><b class="">Convention halls</b></a>
                                <div class="dropdown-divider"></div>
                                
                                <a href="<?=base_url('home/Party_room')?>" style="cursor: pointer;" class="dropdown-item"><b class="">Party rooms</b></a>
                            </div>
                        </li>


                        <li>
                            <a href="#footer" class="nav-link" id="nav_lists">Contact Us</a>
                        </li>



                        <li class="nav-item dropdown ">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="nav_lists">
                              <b >
                                <?php 
                                  $email = $session->get('email');
                                  echo strtok($email,"@");
                                ?>
                              </b></a>
                            <div class="dropdown-menu dropdown-menu-right " >
                                <a href="<?php echo base_url('home/user_profile');?>" class="dropdown-item">
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

<div class="container-fluid search">
      <form action="<?= base_url('home/search')?>" method="POST">
          <i class="fas fa-search" id="search_icon"></i>
          <input type="text" name="search" required placeholder="Search By Area" >
          <button class="btn btn-success btn-md btn" name="search_submit" type="submit">Search</button>
      </form>
</div>

<div style="margin-top: 40px;margin-bottom:20px;" align="center">
            <?php 
              if ($session->getTempdata('success')) {
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
<?php 
    include_once(APPPATH.'/Views/hall_cards.php');
 ?>

<div class="footer" id="footer">  
      <?php 
        include 'footer.html';
       ?>
</div>


<script type="text/javascript" src=" <?php echo base_url('public/js/script.js'); ?> "></script>

</body>
</html>                            