<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>UtsavAalay</title>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public/css/css_file.css'); ?> ">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/33c08b8109.js" crossorigin="anonymous"></script>


<style type="text/css">
.content{
  margin-top: 100px;

}
</style>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/images/logo_white.png');?>" />
</head>
<body>
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
                            <a href="<?php echo base_url('home');?>" class="nav-link" id="nav_lists" style="color: yellow;">Home</a>
                            
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
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="nav_lists" >Our services</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="" class="dropdown-item" style="cursor:not-allowed;">
                                  <span >Banqute halls</span></a>
                                <div class="dropdown-divider"></div>
                                <a href="<?=base_url('home/function_hall')?>" style="cursor: pointer;" class="dropdown-item">Function halls</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?=base_url('home/convention_hall')?>" style="cursor: pointer;" class="dropdown-item">Convention halls</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?=base_url('home/party_room')?>" style="cursor: pointer;" class="dropdown-item">Party rooms</a>

                            </div>
                        </li>
                    
                        <?php 
                        
                        ?>
                        <li class="nav-item">
                            <a href="" class="nav-link btn-sm login-btn" data-target="#loginModal" data-toggle="modal" id="nav_lists">login</a>

                            
                        </li>
                         <li class="nav-item ">
                            <a href="" class="nav-link btn-sm signup-btn" data-target="#signupModal" data-toggle="modal">Create free account</a><!--FFC300-->
                        </li>
                       
                    </ul>            
        </div>
    </nav>
</div>
<?php 
      include_once(APPPATH.'/Views/popups.php');
 ?>
<div class="content">

    <div class="container-fluid search">
      <form action="<?= base_url('home/search')?>" method="POST">
          <i class="fas fa-search" id="search_icon"></i>
          <input type="text" name="search" required placeholder="Search By Area" >
          <button class="btn btn-success btn-md btn" name="search_submit" type="submit">Search</button>
      </form>
    </div>

    <div align="center" style="margin-top: 50px;background-color:orange;">
            <b>
              <?php echo \Config\Services::validation()->listErrors() ?>
            </b>
    </div>

    <div>
          <div style="margin-top: 40px;margin-bottom:20px;" align="center">                
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
                }
                ?>                

          </div>
    </div>

    <div id="slide_box" class="carousel slide" data-ride="carousel">

              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#slide_box" data-slide-to="0" class="active"></li>
                <li data-target="#slide_box" data-slide-to="1"></li>
                <li data-target="#slide_box" data-slide-to="2"></li>
              </ul>
              
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?php echo base_url('public/images/hall8.jpeg');?>" alt="Los Angeles" width="1100" height="500">
                </div>
                <div class="carousel-item">
                  <img src="<?php echo base_url('public/images/hall6.jpeg');?>" alt="Chicago" width="1100" height="500">
                </div>
                <div class="carousel-item">
                  <img src="<?php echo base_url('public/images/hall7.jpeg');?>" alt="New York" width="1100" height="500">
                </div>
              </div>
              
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#slide_box" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#slide_box" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
    </div>




</div>

<!-- halls list --><!-- halls list --><!-- halls list --><!-- halls list -->                        
<?php 
include_once(APPPATH.'/Views/hall_cards.php');
 ?>


<div class="footer" id="footer">  
<?php 
//  include("footer.html");
    include_once(APPPATH.'/Views/footer.html');
 ?>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript" src=" <?php echo base_url('public/js/script.js'); ?> "></script>


</body>
</html>                            