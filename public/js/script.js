/*login password hide/unhide*/

function login_eye() {
var login_pwd_input = document.getElementById("login_pwd_input");
var login_pwd_hide = document.getElementById("login_pwd_hide");
var login_pwd_unhide = document.getElementById("login_pwd_unhide");

if (login_pwd_input.type == "password") {
  login_pwd_input.type = "text";
  login_pwd_hide.style.display="block";
  login_pwd_unhide.style.display="none";

} else {
  login_pwd_input.type = "password";
  login_pwd_hide.style.display="none";
  login_pwd_unhide.style.display="block";
  }
  
}

/*signup new password hide/unhide*/
function signup_eye() {
  var signup_pwd_ip = document.getElementById("signup-pwd");
  var eye_hide = document.getElementById("signup-pwd-hide");
  var eye_unhide = document.getElementById("signup-pwd-unhide");

  if (signup_pwd_ip.type == "password") {
    signup_pwd_ip.type = "text";
    eye_hide.style.display="block";
    eye_unhide.style.display="none";

  } else {
    signup_pwd_ip.type = "password";
    eye_hide.style.display="none";
    eye_unhide.style.display="block";
  }  
}


/*signup confirm password hide/unhide*/
function signup_confirm_eye() {
  var signup_confirm_pwd_ip = document.getElementById("signup-confirm-pwd");
  var confirm_eye_hide = document.getElementById("signup-confirm-pwd-hide");
  var confirm_eye_unhide = document.getElementById("signup-confirm-pwd-unhide");

  if (signup_confirm_pwd_ip.type == "password") {
    signup_confirm_pwd_ip.type = "text";
    confirm_eye_hide.style.display="block";
    confirm_eye_unhide.style.display="none";

  } else {
    signup_confirm_pwd_ip.type = "password";
    confirm_eye_hide.style.display="none";
    confirm_eye_unhide.style.display="block";
  }  
}





  /*for dropdown menues*/
$(document).ready(function(){
  $('#item1').on("click", function(e){
    $(this).next('div').toggle();
    $('#level_2in2_drop').css('display','none');
    e.stopPropagation();
    e.preventDefault();
  });
});

$(document).ready(function(){
  $('#item2').on("click", function(e){
    $(this).next('div').toggle();
    $('#level_1in2_drop').css('display','none');
    e.stopPropagation();
    e.preventDefault();
  });
});


/*5-sec popup form js code*/
$(document).ready(function()
{
  setTimeout(function()
  {
    $('#main').css('display','block');
  },5000);
});

$('#close-btn').click(function()
{
  $('#main').css('display','none');
});

$('#close-btn-pop-signup').click(function()
{
  $('#main').css('display','none');
});

$('#close-btn-pop-login').click(function()
{
  $('#main').css('display','none');
});


// $('#photography').change(function(){
//   var photography_value = $("#photography :selected").val();
//   $("#selected_photography").html(photography_value);
// });

// $('#album').change(function(){
//   var album_value = $("#album :selected").val();
//   $("#selected_album").html(album_value);
// });


// $(document).ready(function(){
// var final_bill = parseInt($("input[name='hall_rent']").val()); 
//       $('input:radio[name=Photographer_rent]').change(function() {
          
//           var Photographer_rent = $(this).val();
//           if (Photographer_rent!=0) {
//             $('#photography').removeAttr('disabled');
//             $('#album').removeAttr('disabled');

//                   var photography_value = $("#photography :selected").val();
//                   var album_value = $("#album :selected").val();
//                   var photography_rent = $("input[name='Photographer_rent']:checked").val();

//                   var final_bill =final_bill+parseInt(photography_value)+parseInt(album_value)+parseInt(photography_rent);
//                   $("#final_bill").html(final_bill);
//           }else{
//             $('#photography').attr('disabled','disabled');
//             $('#album').attr('disabled','disabled');
                
//                   // var hall_rent = $("input[name='hall_rent']").val();
//                   var photography_value = '0'
//                   var album_value = '0'
//                   var photography_rent = '0'

//                   var final_bill =final_bill+parseInt(photography_value)+parseInt(album_value)+parseInt(photography_rent);
//                   $("#final_bill").html(final_bill);
//           }
//       });
// });

// $(document).ready(function){
//       var final_bill =$("input[name='hall_rent']").val();
      
//       $("#final_bill").html(final_bill);    
// }


// $("#final_bill").html(album_value);

/*timing of posted hall details

var dt = new Date();
document.getElementById("date").innerHTML = dt.toLocaleDateString();
var time = new Date();
document.getElementById("time").innerHTML = dt.toLocaleTimeString();
*/



$(document).ready(function () {

  /*tooltip*/
  $('[data-toggle="tooltip"]').tooltip();
  $('#tooltip').on('click',function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

  /*final booking check out button*/  
  $('#final-book').on('click',function(){
    // $('#Booking').modal();
      // if($("#booking_name").val() !="" && 
      //     $("#booking_email").val() !="" &&
      //     $("#booking_phone").val() !="" &&
      //     $("#booking_address").val() !="" &&
      //     $("#booking_pincode").val().length =="6" &&
      //     $("#start_date").val() !="" &&
      //     $("#end_date").val() !="" &&
      //     $("#start_time").val() !="" &&
      //     $("#end_time").val() !="" ) 
      // {
         $('#Booking').modal('show');
         // $(this).closest("form").submit(); 
      // }
      // else{
      //   alert("Please fill out required fields");
      // }
  });


  /*(view card & booking page) Time and Date picker code*/
      $("#check_availability").datepicker({
            dateFormat:"yy-mm-dd",
            minDate: 0
      });
      $("#start_date").datepicker({
          dateFormat:"yy-mm-dd",
          minDate: 0,
          onSelect: function(date) {
          $("#end_date").datepicker('option', 'minDate', date);
        }
      });

      $("#end_date").datepicker({
        dateFormat:"yy-mm-dd"
      });

/*(BOOKINK page) on hitting book button*/
      $('#checkout').on('click', function(){
        var val = "under construction";
      window.alert(val);
      });


});

/*gallery tab layout in view hall page*/
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";  
}

setTimeout(function(){
  $('#close_alert').hide();
},5000);

document.getElementById("defaultOpen").click();
