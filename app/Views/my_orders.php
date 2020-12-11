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
<div class="menu" style="margin-bottom:100px;">
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
                              <b>Home</b>
                            </a>
                            
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
                                <a href="<?php echo base_url('home/user_profile');?>" class="dropdown-item">
                                  <span >Profile</span>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a href="<?php echo base_url('home/my_orders');?>"  class="dropdown-item active">
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

<?php 
use App\Models\booked_details;
$auth = new booked_details();

$email = $session->get('email');
$result = $auth->orWhere(['email'=>$email])
               ->findAll();
if (!$result)
{
$data = ['error'=>'You have no Bookings'];
echo "<div align='center' style='margin-top:20px;margin-bottom:20px;'><span  class='alert alert-danger alert-dismissible fade show' role='alert'>".$data['error'].
            "<a href='#' class='close' data-dismiss='alert'>&times</a></span></div>";
}else{
?>
<div class="table-responsive-sm">
<table class="table table-hover container table-info" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Full Address</th>
      <th scope="col">Rent</th>
      <th scope="col">Date of book</th>
      <th scope="col">Time of book</th>
      <th scope="col">Customer name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>

<?php
  foreach($result as $x => $x_value) 
  {
    $i=0;
    $i++;
?>

    <tr>
      <th scope="row"><?=$i?></th>
      <td><?= $x_value['title']?></td>
      <td><?= $x_value['full_address']?></td>
      <td><?= $x_value['rent']?></td>
      <td><?= $x_value['date_of_book']?></td>
      <td><?= $x_value['time_of_book']?></td>
      <td><?= $x_value['customer_name']?></td>
      <td><?= $x_value['email']?></td>
    </tr>

<?php
  }    
}
?>

  </tbody>
</table>
</div>

<div class="footer" id="footer">  
      <?php 
        include 'footer.html';
       ?>
</div>


<script type="text/javascript" src=" <?php echo base_url('public/js/script.js'); ?> "></script>

</body>
</html>                            