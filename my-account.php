<?php
  require_once('assets/snippets/check_session.php');
  require_once('assets/snippets/db.php');

  // print order
    $user_id = $_SESSION['user_id'];

    //display CURRENT user's order records from table purchase BUT not sure if the session works as I fail logging in..
    //$sql_print_order = "SELECT * FROM purchase WHERE user_id = $user_id";

    //display ALL order records from table purchase
    $sql_print_order = "SELECT * FROM purchase";
    $result_print_order = mysqli_query($connect, $sql_print_order) or die ("error");

  // print username in header
    $sql_print_username = "SELECT fname FROM user WHERE user_id = 4";
    $result_print_username = mysqli_query($connect, $sql_print_username) or die ("error")
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantata+One|Roboto|Material+Icons" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!--   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-TXfwrfuHVznxCssTxWoPZjhcss/hp38gEOH8UPZG/JcXonvBQ6SlsIF49wUzsGno" crossorigin="anonymous"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/my-account.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <title>Verde - My Account</title>


  </head>
  <body>

    <?php include('assets/snippets/navbar.php'); ?>
    <!-- Navbar content over -->

    <!-- Banner image -->
    <div id="banner">
      <img src="assets/images/banner04.jpg">
    </div>

    <div class="main-raised-box">
        <div class="container">
          <!-- My profile header -->
          <div class="row">
            <div class="col-12">
                <div align="center">
                  <img class="avatar-img rounded-circle" src="assets/images/about-us/about-us03.jpg" alt="Avatar">
                </div>
                <div class="name">
                  <h3 class="title text-center text-uppercase">Charlie Chiu</h3>
                  <h6 class="text-center">St Kilda, VIC 3182</h6>
                </div>
            </div>
          </div>
  	<hr>

        <!--My orderes-->
          <div class="col-12 px-4">
            <h1 style="font-family: 'Cantata One', serif;" align="center" class="py-4">MY ORDERS</h1><br>
              <?php
                echo"<table class=table col>";
                echo"<tr><td>Order ID</td><td>Amount</td><td>Shipped Date</td><td>Tracking #</td><tr>";
                while($row = mysqli_fetch_assoc($result_print_order))
                {
                  echo"<tr><td>{$row['purchase_id']}</td><td>AUD$.{$row['amount']}</td><td>{$row['shipped_date']}</td><td>#{$row['tracking_number']}</td><tr>";
                }
                  echo"</table>";
              ?>
          </div>
          </div>
        </div>
      </div>
    </div>
          </div>
        </div>
      </div>
      <!--section over-->



  <!-- Newsletter content -->
  <div class="container-fluid jumbotron mb-0">
    <div class="row">
      <div class="col-12 py-4">
        <div class="text-center">
          <h4 class="text-uppercase">Subscribe to our Newsletter</h6>
          <p class="text-muted">
            Join our newsletter and get news in your inbox every forthnight! <br>We hate spam too, so no worries about this.
          </p>
          <div class="mx-auto w-50 px-5">
            <form action="https://codeanyapp.us19.list-manage.com/subscribe/post?u=b79d60d16651640699cab1935&amp;id=bb9fe757de" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div class="input-group px-5">
                <input type="email" value="" name="EMAIL" class="form-control border-dark border-right-0" id="mce-EMAIL" placeholder="Your Email address" required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                  <input type="text" name="b_b79d60d16651640699cab1935_bb9fe757de" tabindex="-1" value="">
                </div>
                <div class="input-group-append">
                  <button type="submit" class="btn btn-outline-light border-left-0 border-dark"> <i class="fa fa-paper-plane text-dark"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Newsletter content over -->
  <?php include('assets/snippets/footer.php'); ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Custom Js -->
    <script src="assets/js/scrollbar.js" type="text/javascript"></script>
    <script src="assets/js/carousel.js" type="text/javascript"></script>
    <script src="assets/js/validation.js" type="text/javascript"></script>
    <script src="assets/js/account.js" type="text/javascript"></script>
    <script src="assets/js/image-hover.js" type="text/javascript"></script>
    <script src="assets/js/googlemap.js" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfeX-6GJw9JIo_fWqfLFiYa8hwXcZotwo&callback=initMap"></script>
  </body>
</html>
