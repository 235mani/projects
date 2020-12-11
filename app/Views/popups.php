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
                        <form action="<?= base_url('Home/login')?>" method="post"  id="login-pop-form-box">
                            <div id="login-get-otp">
                              <!-- <div class="div-input">
                                  <i id="login-icon" class="fas fa-phone-alt"></i>
                                  <span id="required">*</span>
                                <div class="input-group-append">
                                    <input type="text" name="login_num_append" id="country-code" class="login-inp" size="3"  value="+91" readonly>
                                </div>
                                <input type="tel" name="login_mobile" id="login-num" class="login-inp" placeholder="Mobile"  required="required" title="MOBILE NUMBER SHOULD START WITH 6/7/8/9 & SHOULD BE 10 DIGITS" pattern="[6-9]{1}[0-9]{9}"
                                onkeypress="return event.charCode>=48 && event.charCode<=57" ondrop="return false;" onpaste="return false;">
                              </div> -->

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


<!-- captcha div-->                                        
                                        <!-- <div id="recaptcha-container" class="g-recaptcha" ></div> -->
<!-- captcha div end -->                                        
                                        <div class="login-clear"></div>

                                        <input type="submit" name="login_submit" value="LOGIN" class="btn btn-sm btn-block" id="login_submit">

                                        <!-- <button type="button" class="btn btn-sm btn-block" id="login-sub-btn" onclick="phoneAuth();" id="login-get-otp">Get Otp</button> -->
                                  </div>
                                </form>
<!-- otp verify form -->                            
                              <!-- <form  method="post"  id="login-pop-form-box" >
                                <div id="login-otp-form" style="display: none;">
                                    <h5 style="color: green;" align="center">OTP sent to mobile number</h5>
                                    <div class="div-input">
                                        <i class="fas fa-key" id="login-icon"><span id="required">*</span></i>
                                        <input type="number" name="otp" id="verificationCode" class="login-inp" placeholder="Enter OTP">
                                    </div>
                                    <input type="button" name="login-otp" value="Verify" class="btn btn-sm btn-block" id="login-sub-btn" onclick="codeverify();">
                                </div>
                              </form>  -->
<!-- otp verify form end -->
                                <h6  align="right"> 
                                    <a href="" data-target="#forgetpasswordModal" data-toggle="modal" data-dismiss="modal" id="login-signup_link">Forgot Password?</a>
                                </h6>
                                
                                <hr style="border-top: 1px solid black;"> 
                                <p align="center">OR</p>
                                
                                <!-- <div>
                                  <div class="login-s-icon login-fb">
                                    <a href=""><i class="login-fb_icon fab fa-facebook-f"></i></a>
                                    
                                  </div>
                                  <div class="login-s-icon  login-gplus ">
                                    <a ><i class="login-g_icon fab fa-google-plus-g"></i></a>

                                  </div>
                                </div> -->
                                <div align="center" > 
                                    <a href=""><img src="<?= base_url('public/images/google_signin_img.png')?>" width="310" height="50" id="social_login_img"></a>

                                </div>
                                <br>
                                <div align="center">
                                    <a href=""><img src="<?= base_url('public/images/fb_img.png')?>" width="310" height="50" id="social_login_img"></a>
                                </div>
                                <br>
                                <!-- <br>

                                <p align="center">Don't have an account? 
                                    <a href="" data-target="#signupModal" data-toggle="modal" data-dismiss="modal" id="login-signup_link">Sign Up</a>
                                </p> -->
                              

                    </div>

                
              </div> <!-- final -->
            </div>
            
          </div>
        </div>
      </div>
    </div>


<!--signin pop-up form-->
  <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="modal fade" data-keyboard="false" data-backdrop="static false" id="signupModal" tabindex="-1">
            <div class="modal-dialog modal-md" >
              <div class="modal-content" id="modal-content">
                <div class="modal-header" id="header">
                 <!-- <i class="fa fa-user-circle-o" id="lock-outline"></i> -->
                  <h2>REGISTER</h2>
                  <button class="close" data-dismiss="modal" style="color:white;outline: none;">&times;</button>
                </div>
                    <div class="modal-body" style="background-color: white;">
                              <form action="<?= base_url('Home/register_validate')?>" method="post" id="signin-pop-form-box">

                                <!-- <div class="div-input">
                                  <i class="fa fa-user fa-fw" id="login-icon"><span id="required">*</span></i>

                                  <input  class="login-inp" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=97 && event.charCode<=122 || event.charCode>=65 && event.charCode<=90" placeholder="FullName" type="text" required name="reg_name" >

                                </div> --> <!-- name field ends -->

                                <div class="div-input">
                                    <i class="fas fa-envelope" id="login-icon"><span id="required">*</span></i>
                                    <input class="login-inp"  placeholder="Mail ID" type="email" required name="reg_email">
                                </div>
                                

                                <div class="div-input">
                                  <i class="fas fa-key" id="login-icon"><span id="required">*</span></i>
                                  <input class="login-inp" ondrop="return false;" onpaste="return false;" placeholder="Enter Password" type="Password" required id="signup-pwd" name="reg_pwd">

                                  
                                  <div class="input-group-append" onclick="signup_eye()" style="cursor: pointer;">
                                    <div class="login-inp" id="signup-pwd-unhide"  ><i class="fa fa-eye" id="login-icon" ></i></div>
                                    <div class="login-inp" id="signup-pwd-hide" style="display: none;"><i class="fa fa-eye-slash" id="login-icon"></i></div>
                                  </div>

                                </div>

                                <div class="div-input">
                                  <i class="fas fa-key" id="login-icon"><span id="required">*</span></i>
                                  <input class="login-inp" ondrop="return false;" onpaste="return false;" placeholder="Confirm Password" type="Password" required id="signup-confirm-pwd" name="reg_confirm_pwd">

                                  
                                  <div class="input-group-append" onclick="signup_confirm_eye()" style="cursor: pointer;">
                                    <div class="login-inp" id="signup-confirm-pwd-unhide"><i class="fa fa-eye" id="login-icon" ></i></div>
                                    <div class="login-inp" id="signup-confirm-pwd-hide" style="display:none;"><i class="fa fa-eye-slash" id="login-icon"></i></div>
                                  </div>

                                </div>                                


<!--                                 <div class="div-input">
                                    <i class="fas fa-phone-alt" id="login-icon"><span id="required">*</span></i>
                                    <div class="input-group-append">
                                              <input type="text" name="reg_num_append" id="country-code" class="login-inp" size="3"  value="+91" readonly >
                                    </div>
                                    <input class="login-inp"  placeholder="Mobile Number" type="tel" id="phone" name="reg_mobile"  required title="MOBILE NUMBER SHOULD START WITH 6/7/8/9 & SHOULD BE 10 DIGITS" pattern="[6-9]{1}[0-9]{9}"
                                onkeypress="return event.charCode>=48 && event.charCode<=57" ondrop="return false;" onpaste="return false;">
                                    
                                </div>

                                <div class="div-input">
                                  <i class="fas fa-map-marker-alt" id="login-icon"></i>
                                  <span id="required">*</span></i>
                                    <input class="login-inp" placeholder="Complete Address" type="text" name="reg_address" required="required">                                  
                                
                                  <i class="fas fa-map-pin" id="login-icon"></i>
                                    <span id="required">*</span></i>
                                  
                                    <input class="login-inp" placeholder="PIN number" type="tel" required="required" name="reg_pincode"
                                    title="PINCODE MUST BE 6 DIGITS LENGTH" pattern="[0-9]{6}"
                                onkeypress="return event.charCode>=48 && event.charCode<=57" ondrop="return false;" onpaste="return false;">                                  
                                </div> -->


                                <div class="login-clear"></div>
                                <input type="submit" name="reg_submit" value="Sign Up" class="btn btn-sm btn-block" id="signin_submit">


                                <!-- <div align="right"> 
                                    <a href="" data-target="#loginModal" data-toggle="modal" data-dismiss="modal" id="login-signup_link">Have an account ?</a>
                                </div> -->

                                </form>
                                <!-- <a href="" ><button id="login-sub-btn" class="btn btn-sm btn-block" >Sign Up</button></a> -->

                                <hr style="border-top: 1px solid black;"> 

                                <p align="center">OR</p>
                                
                                <!-- <div class="login-reg-opt">
                                  <div class="login-s-icon login-fb">
                                    <a href=""><i class="login-fb_icon fab fa-facebook-f"></i></a>
                                  </div>
                                  <div class="login-s-icon  login-gplus " onclick="signin();">
                                    <a><i class="login-g_icon fab fa-google-plus-g"></i></a>
                                  </div>
                                </div> -->
                                <div align="center" > 
                                    <a href=""><img src="<?= base_url('public/images/google_signup_img.png')?>" width="310" height="50" id="social_login_img"></a>

                                </div>
                                <br>
                                <div align="center" >
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




 <!--forget password form-->    
  <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="modal fade" data-keyboard="false" data-backdrop="static false" id="forgetpasswordModal" tabindex="-1">
            <div class="modal-dialog modal-md" >
              <div class="modal-content" id="modal-content">
                <div class="modal-header" id="header">
                  <h2>RECOVERY</h2>
                  <button class="close" data-dismiss="modal" style="color:white;outline: none;">&times;</button>
                </div>
                    <div class="modal-body" style="background-color: white;">
                              <form action="<?= base_url('Mail/check_forgot_pwd_user')?>" method="post" id="forgot-pop-form-box">
                                <div class="div-input">
                                  <i class="fas fa-envelope" id="login-icon"><span id="required">*</span></i>
                                  <input type="email" name="forgot_password_user_email" class="login-inp" placeholder="Mail" required id="mail_verify">
                                </div>

                                <div class="login-clear"></div>
                                <input type="submit" name="forgot_password" id="forget_submit" value="Get Link" class="btn btn-success btn-sm btn-block">
                                
                              </form>


<!--                               <form action="#" method="post" id="login-pop-form-box" class="logout-otp-form" style="display: none;">


                                <div align="center" style="color: green;"><b>OTP sent to MAIL</b></div >
                                <div class="div-input">
                                  <i class="fa fa-lock fa-fw" id="login-icon"></i>
                                  <input class="login-inp" type="number" placeholder="XX-XX-XX (6 digits)" required name="otp" id="otp" name="otp" >
                                </div>

                                <div class="login-clear"></div>
                                <input type="submit" name="verify_otp" disabled value="Verify" id="verify_otp" class="btn btn-dark btn-md"> 
                                
                              </form>
 -->
                    </div>

                
              </div> <!-- final -->
            </div>
            
          </div>
        </div>
      </div>
    </div>

 <!--forget password form complete-->   