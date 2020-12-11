<!DOCTYPE html>
<html>
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

</head>
<body>
<?php 
    $session=session();
    $session->set('current_viewed_hall','');
    if (isset($get_book_data)) 
    {
        $id = $get_book_data;
    }
    use App\Models\hall_db;
    $con = new hall_db();
    $users= $con->where([
       'id'=>$id,
     ])
    ->findAll();
    foreach($users as $x => $x_value) 
    {
?>
<div class="">
  <div class="encapsulation">
      
    
      <form action="">

            <div class="selection">
              
                    <div class="fun">
                      <h1 style="color:#1DDA8A">
                        <b><?= ucwords($x_value['title'])?></b>
                      </h1>

                      <h5 style="color:orange;">
                        <b>Location:
                            <?= ucwords($x_value['full_address'])?>
                        </b>
                      </h5>
                    </div>

                    <div class="form-group">
                      <div class="row" id="datepicker">
                           <div id="datefrom" class=" date" >
                                   <fieldset class="border p-2">
                                      <legend  class="w-auto">Date From<span id="required">*</span></legend>
                                          <input class="form-control" type="text" readonly placeholder="Enter Starting Date" style="text-align: center;" id="start_date" required="required">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </fieldset>
                            </div>
                            <!-- <input type="button" name="" value="click" id="kottu"> -->
                            <div id="dateto" class=" date" >
                                   <fieldset class="border p-2">
                                      <legend  class="w-auto">Date To<span id="required">*</span></legend>
                                          <input class="form-control" type="text" readonly placeholder="Enter Ending Date" style="text-align: center;" id="end_date" required>
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </fieldset>
                            </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row" id="timepicker">
                          <div id="time1" >
                                <fieldset class="border p-2">
                                   <legend  class="w-auto">Time From<span id="required">*</span></legend>
                                    <input class="form-control" type="time"  placeholder="Enter Starting Time" style="text-align: center;" id="start_time" required>                                        
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </fieldset>
                          </div>
                    
                          <div id="time2">
                                <fieldset class="border p-2">
                                   <legend  class="w-auto">Time To<span id="required">*</span></legend>
                                    <input class="form-control" type="time"  placeholder="Enter Ending Time" style="text-align: center;" id="end_time" required>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                               </fieldset>
                          </div>
                      </div>
                    </div>


            </div>
      
        <div class="row">  
            <div class="bill_details">
                  <h3>Billing Details</h3><hr>
                                
                  <div class="div-input">                                 
                    <i class="fa fa-user" id="login-icon"></i><span id="required">*</span>
                    <input type="text" id="booking_name" class="login-inp" name="name" placeholder="NAME" value="<?= $session->get('name')?>" >
                  </div>

                  <div class="div-input">                                 
                      <i class="fa fa-envelope" id="login-icon"></i><span id="required">*</span>
                      <input type="text" id="booking_email" name="email" class="login-inp" placeholder="E-MAIL" value="<?= $session->get('email')?>" readonly >
                  </div>

                  <div class="div-input">
                      <i class="fas fa-phone-alt" id="login-icon"></i><span id="required">*</span>
                      <input class="login-inp"  placeholder="MOBILE NUMBER" type="tel" id="booking_phone" name="phone" value="<?= $session->get('mobile')?>" >
                  </div>

                  <div class="div-input">                                 
                      <i class="fa fa-address-card-o" id="login-icon"></i> <span id="required">*</span>
                      <input type="text" id="booking_address" name="address" class="login-inp" placeholder="ADDRESS" value="<?= $session->get('address')?>" >
                  </div>

                  <div class="div-input">                                 
                      <i class="fa fa-institution" id="login-icon"></i><span id="required">*</span>
                      <!-- <input type="tel" id="pincode" name="pincode"  class="login-inp" placeholder="pincode"  required> -->
                      <input class="login-inp" placeholder="PIN number" type="tel"  id="booking_pincode" name="pincode" value="<?= $session->get('pincode')?>"
                      title="PINCODE MUST BE 6 DIGITS LENGTH" ondrop="return false;" onpaste="return false;"
                  onkeypress="return event.charCode>=48 && event.charCode<=57">
                  </div>

            </div>
            <div class="customization">
                <h3>Providing Services</h3><hr>
                  <h5 style="font-family: Impact;color:green" align="center"> Hall Rent</h5>

                  <b>Hall Rent : <i class="fas fa-rupee-sign" style="color:red"></i><span class="price_color"><?= ucwords($x_value['rent'])?></span></b>
                    <input type="hidden" value="<?= ucwords($x_value['rent'])?>" name="hall_rent">


                  <h5 style="font-family: Impact;color:green" align="center"> Photography</h5>
                    

                    <i class="fa fa-user" id="login-icon">
                      &nbsp Photographer Rent : 
                    </i>
                        <br>
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="Photographer_rent" value="10000"><b> YES : </b><i class="fas fa-rupee-sign" style="color:red"><b style="font-size: 20px"> 10000/-</b></i>
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="Photographer_rent" value="0" checked><b> NO : </b> <i class="fas fa-rupee-sign" style="color:red" ><b style="font-size: 20px"> 0/-</b></i>
                    </label>
                  </div>
                                   

                    <br>
                    
                    <div>
                        <i class="fas fa-video" id="login-icon">
                          &nbsp Type of Photography : </i>
                    
                        <select id="photography" disabled name="photography">
                          <option value="75000">Crane Photography = 75000</option>
                          <option value="50000">Drone Photography = 50000</option>
                          <option value="35000">Regular Photography = 35000</option>
                          <option value="0" selected>NONE</option>
                        </select> 
                        
                        <!-- &nbsp<b><i class="fas fa-rupee-sign" style="color:red"> 
                              <span style="font-size: 20px;">
                              <span id="selected_photography">0</span>
                              /-
                              </span>
                        </i></b>   -->  

                    </div>
                    <div>
                        <i class="fas fa-images" id="login-icon">
                          &nbsp Type of Album :
                        </i>         
                        <select id="album" disabled name="album">
                          <option value="8000">Softcover Album = 8000</option>
                          <option value="15000">Premium  Album = 15000</option>
                          <option value="30000">Flush mount Album = 30000</option>
                          <option value="0" selected>NONE</option>
                        </select> 
                        <!-- &nbsp<b><i class="fas fa-rupee-sign" style="color:red"> 
                                    <span style="font-size: 20px;">
                                    <span id="selected_album">0</span>/-
                                    </span>
                        </i></b>  -->
                    </div> 
<br><hr>
<img src="https://img.icons8.com/ios-filled/25/000000/billing-machine.png"/>
<b>FINAL BILL : </b>
&nbsp<b><i class="fas fa-rupee-sign" style="color:red"> 
                                <span style="font-size: 20px;">
                                <span id="final_bill">0</span>/-
                                </span>
</i></b>  








<!--               <div class="custom_options" >
                      <h5><b>Catering</b></h5> 
                        <input type="radio" name="catering" required="required" id="cust_radio"> &nbsp YES &nbsp
                        <input type="radio" name="catering"> &nbsp NO &nbsp
                        <input type="radio" name="catering" checked="true"> &nbsp Not Yet confirmed

                      <br><br>
                      <h5><b>Decoration</b></h5>  
                        <input type="radio" name="decoration" required="required" checked="true" id="cust_radio"> &nbsp YES &nbsp
                        <a data-toggle="tooltip" title="Decoration will be arranged by hall management . if any problem with this Service ,Kindly contact our team Blue Carpt helpline" id="tooltip"><i class="fas fa-info-circle"></i>  Help</a>
                      
                      <br><br>
                      <h5><b>Music System</b></h5>
                        <input type="radio" name="sound" required="required" checked="true" id="cust_radio"> &nbsp YES &nbsp
                        <input type="radio" name="sound"> &nbsp NO &nbsp
                        <input type="radio" name="sound" checked="true"> &nbsp Not Yet confirmed
                  
                      <br><br>
                      <h5><b>Photo & Video Graphy</b></h5>
                        <input type="radio" name="video" required="required" checked="true" id="cust_radio"> &nbsp YES &nbsp
                        <input type="radio" name="video"> &nbsp NO &nbsp
                        <input type="radio" name="video" checked="true"> &nbsp Not Yet confirmed

                      <br><br>
                      <h5><b>Artists</b></h5>
                        <input type="radio" name="artists" required="required" checked="true" id="cust_radio"> &nbsp YES &nbsp
                        <input type="radio" name="artists"> &nbsp NO &nbsp
                        <input type="radio" name="artists" checked="true"> &nbsp Not Yet confirmed
                  </div>
 -->            </div>
<!--             <div class="payment_details">
                  <h3>Payment</h3>
                  <label for="fname">Accepted Cards</label>
                  <div class="icon-container">
                    <i class="fab fa-cc-visa" style="color:navy;"></i>
                    <i class="fab fa-cc-mastercard" style="color:red;"></i>
                  </div>
                  <div class="form-group">
                        <label  >Name on Card</label><span id="required">*</span>
                        <input type="text" id="cname" name="cardname" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">                    
                        <label for="ccnum">Credit card number</label><span id="required">*</span>
                        <input type="text" id="ccnum" name="cardnumber" pattern="\d*" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                  </div>

                  <div class="container">
                      <div class="row">
                          <div class="form-group"> 
                              <label for="expyear">Exp Month , Year</label><span id="required">*</span>
                              <input type="month" id="expyear" class="form-control" name="expyear" placeholder="2018" required>
                          </div>
                          <div class="form-group"> 
                              <label for="cvv">CVV</label><span id="required">*</span>
                              <input type="text" id="cvv" name="cvv" class="form-control" placeholder="352" required>
                          </div>
                      </div>
                </div>
            </div> -->
         
          </div><br> <!-- data-target="#Booking" data-toggle="modal" -->
        <input type="button" value="Continue to checkout"  class="btn btn-block btn-primary" id="final-book">
      </form>

  </div>
</div>



<div class="modal fade" data-keyboard="true" data-backdrop="static false" id="Booking" tabindex="-1">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header" id="header">
          <h2>PAYMENT</h2>
          <button class="close" data-dismiss="modal" style="color: white;">&times;</button>
        </div>
          <div class="modal-body">
            <form>
              
                <div class="payment_details">
                      
                      <div class="icon-container">
                        <label for="fname">Accepted Cards</label>
                        <i class="fab fa-cc-visa" style="color:navy;"></i>
                        <i class="fab fa-cc-mastercard" style="color:red;"></i>
                      </div>
                      <div class="form-group">
                            <label  >Name on Card</label><span id="required">*</span>
                            <input type="text" id="cname" name="cardname" class="form-control" placeholder="" required>
                      </div>
                      <div class="form-group">                    
                            <label for="ccnum">Card Number</label><span id="required">*</span>
                            <input type="text" id="ccnum" name="cardnumber" pattern="\d*" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                      </div>

                      <div class="container">
                          <div class="row">
                              <div class="form-group"> 
                                  <label for="expyear">Exp Month , Year</label><span id="required">*</span>
                                  <input type="month" id="expyear" class="form-control" name="expyear" placeholder="2018" required>
                              </div>
                              <div class="form-group"> 
                                  <label for="cvv">CVV</label><span id="required">*</span>
                                  <input type="text" id="cvv" name="cvv" class="form-control" placeholder="352" required>
                              </div>
                          </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="payment" value="PAY" class="btn btn-primary btn-block">
                    </div>
                </div>              
            </form>

            </div>
          </div>
    </div>
</div>


<div class="footer" id="footer">  
<?php 
include_once("footer.html");
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




<?php

    }

 ?>
</body>
</html>
