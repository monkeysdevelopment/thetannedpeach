$(document).ready(function(){
  $('#login_form').submit(function(e){
    e.preventDefault();
    e.stopPropagation();
    var email = $('#email').val();
    var password = $('#password').val();
    if (email != '' && password != '') {
      $.ajax({
        url: 'login.php',
        method: 'POST',
        data: {
          email: email,
          password: password
        },
        success: function(data){
          if(data == "no"){
            $('#loginerr').show();
            $('#loginsucc').hide();
          }else{
            $('#loginerr').hide();
            $('#loginsucc').show();
            setTimeout( function(){ location.href = "index.php"; }, 1000 );
          }
        }
      });
    }else {
      alert("All fields are required!");
    }
  });
});
