<?php 
  $session=session();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UtsavAalay</title>
<!-- custom css -->
<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public/css/css_file.css'); ?> ">
<!-- bootstrap css -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- fontawsom -->
<script src="https://kit.fontawesome.com/33c08b8109.js" crossorigin="anonymous"></script>

<!-- calender css -->
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">

<style type="text/css">
  .menu{
    margin-bottom:80px;
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
                            <a href="<?php echo base_url('home');?>" class="nav-link" id="nav_lists">Home</a>
                            
                        </li>
                        <li>
                            <a href="#footer" class="nav-link" id="nav_lists">Contact Us</a>
                        </li>
                    
                       
                    </ul>            
        </div>
    </nav>
</div>
<?php 
      $last_viewed_hall = current_url();

      $session->set('last_viewed_hall',$last_viewed_hall);
?>
<!--login pop-up form-->
  <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="modal fade" data-keyboard="false" data-backdrop="static false" id="loginModal" tabindex="-1">
            <div class="modal-dialog modal-md" >
              <div class="modal-content" id="modal-content">
                <div class="modal-header" id="header">
                  <h2>LOGIN</h2>
                  <button class="close" data-dismiss="modal" style="color:white;outline: none;">&times;</button>
                </div>
                    <div class="modal-body" style="background-color: white;">
                        <form action="<?= base_url('Home/login/hall_details_login')?>" method="post"  id="login-pop-form-box">
                            <div id="login-get-otp">
                                <div class="div-input">
                                    <i class="fas fa-envelope" id="login-icon"><span id="required">*</span></i>
                                    <input class="login-inp"  placeholder="Mail ID" type="email" required name="login_email">
                                </div>


                                <div class="div-input">
                                  <i class="fas fa-key" id="login-icon"><span id="required">*</span></i>
                                  <input class="login-inp" ondrop="return false;" onpaste="return false;" placeholder="Enter Password" type="Password" required id="login_pwd_input" name="login_pwd" >

                                  <div class="input-group-append" onclick="login_eye()" style="cursor: pointer;">
                                  
                                    <div class="login-inp" id="login_pwd_hide" style="display: none;">
                                        <i class="fa fa-eye-slash" id="login-icon"></i>
                                    </div>
                                    <div class="login-inp" id="login_pwd_unhide" >
                                        <i class="fa fa-eye" id="login-icon"></i>
                                    </div>
                                  </div>

                                </div>
                                    
                                        <div class="login-clear"></div>

                                        <input type="submit" name="login_submit" value="LOGIN" class="btn btn-sm btn-block" id="login_submit">
                                  </div>
                                </form>

                                <h6  align="right"> 
                                    <a href="" data-target="#forgetpasswordModal" data-toggle="modal" data-dismiss="modal" id="login-signup_link">Forgot Password?</a>
                                </h6>
                                
                                <hr style="border-top: 1px solid black;"> 
                                <p align="center">OR</p>

                                <div align="center" > 
                                    <a href=""><img src="<?= base_url('public/images/google_signin_img.png')?>" width="310" height="50" id="social_login_img"></a>

                                </div>
                                <br>
                                <div align="center">
                                    <a href=""><img src="<?= base_url('public/images/fb_img.png')?>" width="310" height="50" id="social_login_img"></a>
                                </div>
                                <br>
                    </div>

                
              </div> <!-- final -->
            </div>
            
          </div>
        </div>
      </div>
    </div>
<?php 
    if (isset($get_data)) 
    {
        $id = $get_data;
    }
    use App\Models\hall_db;
    $con = new hall_db();
    $users= $con->where([
       'id'=>$id,
     ])
    ->findAll();
    foreach($users as $x => $x_value) 
    {

if ($session->getTempdata('fail')) {
?>
  <div align="center">
      <label id="close_alert" class="alert alert-danger alert-dismissible fade show">
        <a href="#" class="close" data-dismiss="alert">&times</a>
        <?php 
            echo "<b>".$session->getTempdata('fail')."</b>";
        ?>  
      </label>
  </div>
<?php
}elseif ($session->getTempdata('success')) {
?>
  <div align="center">
      <label id="close_alert" class="alert alert-success alert-dismissible fade show">
        <a href="#" class="close" data-dismiss="alert">&times</a>
        <?php 
            echo "<b>".$session->getTempdata('success')."</b>";
        ?>  
      </label>
  </div>
<?php
}
?>

<div class="container-fluid">
  
    <div class="col-lg-12 col1 " id="card_shadow">
        <h5 style="text-align:left;"><b>NAME : </b><?= ucwords($x_value['title'])?>
            <span style="float:right;">
  
                <?php 
  //                include_once("ratting.php");
                 ?>
            </span>
        </h5>
        
        <h5><b>ADDRESS : </b><?= ucwords($x_value['full_address'])?></h5>
        <h5><b>HALL RENT : </b> <i class="fas fa-rupee-sign" id="price_icon">
        </i><span><?= ucwords($x_value['rent'])?> </span> </h5>
    </div>
    <div class="col2_col3">
      <!-- <div class="row"> -->
      <div class="col2" id="card_shadow">
            <div id="silde_target" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#silde_target" data-slide-to="0" class="active"></li>
                      <li data-target="#silde_target" data-slide-to="1"></li>
                      <li data-target="#silde_target" data-slide-to="2"></li>
                    </ul>
                    
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="<?php echo base_url('public/images/hall7.jpeg');?>" alt="Los Angeles" width="1100" height="500">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo base_url('public/images/hall8.jpeg');?>" alt="Chicago" width="1100" height="500">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo base_url('public/images/hall6.jpeg');?>" alt="New York" width="1100" height="500">
                      </div>
                    </div>
                    
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#silde_target" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#silde_target" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
              </div>            
      </div>
      <div class="col3 " id="card_shadow">
            
         <div class="hall-view-card_shadows">
                    <h4 >FOOD TYPE</h4>
                       <table align="center">
                            <tbody>
                                <tr>
                                    <td><img src="https://img.icons8.com/color/20/000000/vegetarian-food-symbol.png" id="food"></td>
                                    <td>Vegetaraian</td>
                                    <td><i class="fas fa-rupee-sign" id="price_icon"></i> <?= ucwords($x_value['veg_price'])?></td>
                                </tr>
                                <tr>
                                    <td><img src="https://img.icons8.com/color/20/000000/non-vegetarian-food-symbol.png" id="food"></td>
                                    <td>Non-Vegetaraian</td>
                                    <td><i class="fas fa-rupee-sign" id="price_icon"></i> <?= ucwords($x_value['non_veg_price'])?></td>
                                </tr>

                             </tbody>
                      </table>
                      <hr>

                      <h4>SEATING</h4>
                      
                      <div class="seating_left"> 
                        hall<br><?= ucwords($x_value['hall_capacity'])?>
                      </div>
                      
                      <div class="seating_right">
                        Lawn<br><?= ucwords($x_value['hall_capacity'])?>
                      </div>
                      <br><br>
                      <hr>
                       <form action="" method="POST" id="check_availability_form">
                              <h4 >CHECK AVAILABILITY</h4>
                              <div id="checkavailability" class="input-group date" >
                                <input class="form-control" type="text" style="text-align: center;"  placeholder="YEAR-MONTH-DATE" id="check_availability" name="check_availability" readonly="">
                               
                              </div>
                                <b><span id="msg" ></span></b>
                                
                                <br>
                                
                        <?php 

                            $val= $x_value['id'];
                            $session=session();
                            if ($session->get('email')!=null) {
                              
                        ?>
                        <a href="<?=base_url('home/booking_page')?><?php echo "/".$val?>">
                            <input type="button" name="" value="CHECK" id="check_availability_button" class="btn btn-block btn-success">
                        </a>
                        <?php
                            }else{
                        ?>

                        <input type="button" value="CHECK" class="btn btn-block btn-success" data-target="#loginModal" data-toggle="modal" id="check_availability_button" >


                        <?php
                            }
                        ?>
                
                  </form>
                         

              </div>
          </div>
        </div>
    <div class="col4  " id="card_shadow">
          
        <div class="gal_tabs">
          <button class="tablinks active"  onclick="openCity(event, 'hall_images')">Hall Images</button>
          <button class="tablinks" onclick="openCity(event, 'Dining_images')">Dining Images</button>
          <button class="tablinks" onclick="openCity(event, 'Previous_celebrations')">Celebrations</button>
        </div>

        <div id="hall_images" class="tabcontent hall-view-card_shadows" style="display:block;">
            <div class="gallery ">
              
              <a href="<?php echo base_url('public/images/hall4.jpg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall4.jpg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall3.jpg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall3.jpg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall2.jpg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall2.jpg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall1.jfif');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall1.jfif');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall5.jfif');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall5.jfif');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall6.jpeg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall6.jpeg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall7.jpeg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall7.jpeg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall8.jpeg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall8.jpeg');?>" id="big"></a>

              
          </div>
        </div>

        <div id="Dining_images" class="tabcontent hall-view-card_shadows">
            <div class="gallery">
              <a href="<?php echo base_url('public/images/hall6.jpeg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall6.jpeg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall7.jpeg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall7.jpeg');?>" id="big"></a><a href="<?php echo base_url('public/images/hall4.jpg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall4.jpg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall3.jpg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall3.jpg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall1.jfif');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall1.jfif');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall2.jpg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall2.jpg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall1.jfif');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall1.jfif');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall8.jpeg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall8.jpeg');?>" id="big"></a>
          </div>
        </div>

        <div id="Previous_celebrations" class="tabcontent hall-view-card_shadows">
            <div class="gallery">
              <a href="<?php echo base_url('public/images/hall2.jpg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall2.jpg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall1.jfif');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall1.jfif');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall2.jpg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall2.jpg');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall1.jfif');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall1.jfif');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall5.jfif');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall5.jfif');?>" id="big"></a>
              <a href="<?php echo base_url('public/images/hall6.jpeg');?>" id="small" data-lightbox="mygallery" data-title="hall"><img src="<?php echo base_url('public/images/hall6.jpeg');?>" id="big"></a>
          </div>
        </div>
    </div>
    

    <div class="col5  " id="card_shadow">
            <h5><b>ABOUT :</b> <?= ucwords($x_value['about_hall'])?></h5>
    </div>

    <div class="col6"  id="card_shadow">
      <div class="loader" >

        </div>
        <h1 >For Google Ad's</h1>
    </div>

</div>


<div class="footer" id="footer">  
<?php 
  include("footer.html");
 ?>
</div>


<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- calender js -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>

<!-- custom js -->
<script type="text/javascript" src=" <?php echo base_url('public/js/script.js'); ?> "></script>     

<script type="text/javascript">
$(document).ready(function (){
     $('#check_availability_button').click(function(){
          var check_availability_date = $('#check_availability').val();
        if (check_availability_date == '') {
            alert("please select date ");
            return false;
        }
     }); 
    $('#check_availability').change(function(){
      var check_availability_date = $('#check_availability').val();
      if (check_availability_date != '') {
        $.ajax({
          url:"<?= base_url()?>/Home/check_availability",
          method:"POST",
          data:{check_availability_date:check_availability_date},
          dataType:"JSON",
          success:function(data){
            if (data.fail) {
              $('#msg').css('color','red');
              $("#msg").text(data.fail);
              $('#check_availability_button').attr('disabled','true');
              $('#check_availability_button').addClass('btn-warning');
              $('#check_availability_button').css({'font-weight':'bold','cursor':'not-allowed','color':'black'});
              $('#check_availability_button').attr('value','HALL UNAVAILABLE');
              
            }else{
              $('#msg').css('color','green');
              $("#msg").text(data.success);
              $('#check_availability_button').css({'cursor':'pointer','color':'white','font-weight':'bold'});
              $('#check_availability_button').attr('value','BOOK NOW');
              $('#check_availability_button').removeAttr('disabled','true');
              $('#check_availability_button').removeClass('btn-warning');

              
            }
            
          },
          error:function(){
            alert("error occured , Please contact our admin!");
          }
        });
      }else{
        alert("Please enter Date");
      }
    });
  });
</script>



<?php

    }

 ?>
</body>
</html>