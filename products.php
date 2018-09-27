<?php
  require_once('assets/snippets/check_session.php');
  require_once('assets/snippets/db.php');
  //retriving cards info
  $sql1 = "SELECT  item.item_id, item.name, item.price, image.url FROM item INNER JOIN image ON image.item_id = item.item_id WHERE image.url LIKE '%01a%' AND is_new = 1";
  $result1 = $connect->query($sql1);

  //only for the images
	$sql2="SELECT  image.url FROM item INNER JOIN image ON image.item_id = item.item_id WHERE image.url LIKE '%01b%' AND is_new = 1";
  $result2 = mysqli_query($connect, $sql2);
 ?>

<!DOCTYPE html>
<html  lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantata+One|Roboto|Material+Icons" />
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" href="assets/css/productsPage.css">
  <title>Verde - Products</title>

</head>

<body class="parallax">
  <header class="header">
    <!-- navbar -->
   <?php include('assets/snippets/navbar.php'); ?>
    <br>
  	<div id="beginning_space"></div>
    <div class="d-flex align-items-center side">

  		<div class="ml-10 text-left">
  			<!-- Breadcrumbs -->
          <ol class="breadcrumb breadcrumb_ mb-0 pl-8">
            <li class="breadcrumb-item "><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
  		</div>
  		<div class="pr-0  ml-auto">
  			<!-- number of cards shown -->

        <!-- sorting -->
      </div>
  	</div>
  </header>
<!-- main -->
<div id="favSidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
    <i class="fal fa-times fa-2x"></i>
  </a>

  <div id="fav_items">
    <h4 class="text-light text-uppercase text-center pb-4 border-bottom"><i class="material-icons">favorite</i> My favorite</h4>
    <div class="pt-4 sidebar"></div>
  </div>
</div>
<main id="main">
  <div id="cover"></div>
<div class="container">
  <h2>What's new</h2>
  <div id="products-id" class="bg-transparent products-grid pr-0 ml-auto col-sm-9" >
    <?php
    //creation of cards with information from DB
        if ($result1->num_rows > 0) {
          for($r = 1; $r <= 3; $r++){
            //only 9 cards for page => 3 rows
          echo '<div class="row row-cards" >';
          for ($x = 1; $x <= 3; $x++) {

            //only 3 cards on each row
            while(($row = $result1->fetch_assoc())&&($row2 = $result2->fetch_assoc()) ){
              echo('<div class="col-sm-4">'.
                  '<div class="card card_products" >'.
                    '<a href="product-detail.php?var='.$row["item_id"].'">');?>
                        <img onmouseover="this.src='<?php echo $row2["url"]; ?>';" onmouseout="this.src='<?php echo $row["url"]; ?>';" class="card-img-top" src=" <?php echo $row["url"]; ?>">
        <?php echo ('</a>'.
                    '<div class=" card-body card-body_product d-flex align-items-center">'.
                      '<div class="text-left">'.
                        '<a class="a_title" href="product-detail.php?var='.$row["item_id"].'">'.
                          '<h6 class="card-title">'.$row["name"].'</h6>'.
                        '</a>'.
                        '<p class="card-text" >AUD$ '.$row["price"].'</p>'.
                      '</div>'.
                      '<div class=" favourite-card ml-auto">'.
                        '<i class="material-icons fav" onclick="favItem('.$row["item_id"].','.$_SESSION['user_id'].')">favorite_border</i>'.
                      '</div>'.
                    '</div>'.
                 '</div>'.
               '</div>');
            }
          }
          echo '</div> ';
          }
        } else {
          echo "0 results";
       }
    ?>
  </div>
</div>

  <!-- Product grid -->

<div class="container">
<!-- pagination -->

  <h2>Find what you need</h2>
  <div class="row">
    <div  id="filters" class="col-sm-4">
      <?php include('assets/snippets/filters.php'); ?>
    </div>
    <div class="col-sm-8" >
    <div class="pagination"></div>
      <div class="row m-0 p-0" id="filter_prods">
        <?php include('all_prod.php'); ?>
      </div>
    </div>
  </div>
</div>

</main>

  <!-- Footer content -->
  <?php include('assets/snippets/footer.php'); ?>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="assets/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Custom Js -->
    <script src="assets/js/scrollbar.js" type="text/javascript"></script>
    <script src="assets/js/carousel.js" type="text/javascript"></script>
    <script src="assets/js/validation.js" type="text/javascript"></script>
    <script src="assets/js/filters.js" type="text/javascript"></script>
    <script src="assets/js/search.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>

  <script>
    // [START] global variables
    // found is needed to store the array from the favorite table
    var found;
    var user_id = <?php echo $_SESSION['user_id']; ?>;
    // [END] global variables


    $(document).ready(function(){
      //hide this [?? maybe better way for this ??]
      $('.count').hide();

      //check from the DB to fill hearts on items already favorite
      checkFavItems(user_id);
      //count is needed to fill the red pill badge for the number on the nav bar
      countFav();
      

      $('.fav').click(function(){
          checkFavItems(user_id);
        
          countFav();
      });

      //on hover check if already favorite
      hoverFav();

      $("#user_icon").tooltip('show');
      setTimeout(function(){
        $("#user_icon").tooltip('dispose');
      }, 3000);
      
    });

    var isFavorite = false;
    function hoverFav(){
      //boolean to check if the item hovered is already favorite
      $('.fav').hover(
        //on mouse enter
        function(){
          //get id of this specific element
          var id = $(this).attr("id");
          //compare it with the elements in the found array
          //if(jQuery.inArray(id, found) > -1){
          if( $(this).text() == "favorite" ){
            isFavorite = true;
            //delete favorite record if hear is clicked
            $('#'+id).click(function(){
              deleteFavItem(id, user_id);
            });
          } else {
            //interactive effect if not already filled
            $(this).text("favorite");
            isFavorite = false;
            //add record in the DB on click
            $('#'+id).click(function(){
              favItem(id, user_id);
            });
          }
          console.log(isFavorite);
        },
        //on mouse leave
        function(){
          if(!isFavorite){
            //replace the heart with the empty
            $(this).text("favorite_border");
          }
          console.log(isFavorite);
        }
      );
    }

    function favItem(item_id, user_id){
      //give alert if user doesn't exists and prompt login / sign up modal
      if(user_id == "" || user_id == null)
      {
        alert("You must have an account before proceeding.");
        $("#accountModal").modal();
      }
      else {
        $.ajax({
          url: 'favourite.php',
          type: "GET",
          data: { item_id: item_id, user_id: user_id },
          success: function(result) {
            checkFavItems(user_id);
            countFav();
            isFavorite = true;
            //console.log(result);
          },
          error: function(err) {
            console.log(err);
          }
        });
      }
    }

    function checkFavItems(user_id){
      if(user_id == "" || user_id == null)
      {
        alert("User ID not valid");
      }else {
        $.ajax({
          url: 'assets/snippets/find_favourite.php',
          type: "GET",
          data: { user_id: user_id },
          success: function(result) {
            //parse json from the DB
            found = JSON.parse(result);
              $('.found_fav').each(function(i){
                if(jQuery.inArray($(this).val(), found) > -1){
                  $('#'+ $(this).val() ).text("favorite");
                } else {
                  $('#'+ $(this).val() ).text("favorite_border");
                }
              });
          },
          error: function(err) {
            console.log(err);
          }
        });
      }
    }
    
    //count html with count for badge
    function countFav(){
      $.get('assets/snippets/count_fav.php')
          .done(function( result ){
          $('#count_fav').html(result);
      });
    }

    function deleteFavItem(item_id, user_id){
      if(user_id == "" || user_id == null)
      {
        alert("User ID not valid");
      }
      else {
        $.ajax({
          url: 'assets/snippets/delete_fav.php',
          type: "GET",
          data: { item_id: item_id, user_id: user_id },
          success: function(result) {
            checkFavItems(user_id);
            countFav();
            isFavorite = false;
            $("#rowfav-"+item_id).remove();
            //console.log(result);
          },
          error: function(err) {
            console.log(err);
          }
        });
      }
    }

    function openNav(){
      $('#favSidenav').css("width", "400px");
      $('#cover').show();
      $.get("assets/snippets/sidebar_items.php")
        .done(function(result){
          $('.sidebar').html(result);
        }); 
    }

    function closeNav() {
      $('#favSidenav').css("width", "0");
      $('#cover').hide();
    }

  </script>
</body>
</html>
