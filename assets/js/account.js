$(document).ready(function(){
  $('#login_form').submit(function(e){
    e.preventDefault();
    e.stopPropagation();
    var email = $('#email_login').val();
    var password = $('#password_login').val();
    if (email != '' && password != '') {
      $.ajax({
        url: 'login.php',
        method: 'POST',
        data: {
          email: email,
          password: password
        },
        success: function(data){
          console.log("login: " + data);
          if(data == "no"){
            $('#loginerr_login').show();
            $('#loginsucc_login').hide();
          }else{
            $('#loginerr_login').hide();
            $('#loginsucc_login').show();
            //setTimeout( function(){ location.href = "index.php"; }, 1500 );
          }
        }
      });
    }
  });

  $('#registration_form').submit(function(e){
    e.preventDefault();
    e.stopPropagation();
    var fname = $('#fname').val();
    var email = $('#email_reg').val();
    var password = $('#password_reg').val();
    if (email != '' && password != '') {
      $.ajax({
        url: 'registration.php',
        method: 'POST',
        data: {
          fname: fname,
          email: email,
          password: password
        },
        success: function(data){
          console.log("registration: " + data);
          if(data == "no"){
            $('#loginerr_reg').show();
            $('#loginsucc_reg').hide();
          }else{
            $('#loginerr_reg').hide();
            $('#loginsucc_reg').show();
            setTimeout( function(){ location.href = "index.php"; }, 1500 );
          }
        }
      });
    }
  });

});
