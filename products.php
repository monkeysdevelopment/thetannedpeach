<?php
  require_once('assets/snippets/check_session.php');
  require_once('assets/snippets/db.php');
  //retriving cards info
  $sql="SELECT  item.item_id, item.name, item.price, image.url FROM item INNER JOIN image ON image.item_id = item.item_id WHERE image.url LIKE '%01a%' AND is_new = 1";
  $result = mysqli_query($connect, $sql);
 ?>

<!DOCTYPE html>
<html  lang="en" dir="ltr">
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
	<!--link rel="stylesheet" href="assets/css/productsPage.css"-->
  <title>Verde - Products</title>

</head>

<body>
  <!-- navbar -->
 <?php include('assets/snippets/navbar.php'); ?>
  <br>
	<div id="beginning_space"></div>
  <div class="d-flex align-items-center py-5">

		<div class="ml-10 text-left">
			<!-- Breadcrumbs -->
        <ol class="breadcrumb breadcrumb_ mb-0 pl-8" style=" padding:24px">
          <li class="breadcrumb-item "><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
		</div>
		<div class="pr-0  ml-auto">
			<!-- number of cards shown -->

      <!-- sorting -->

			<!-- pagination -->

      <nav aria-label="Page navigation example">
        <ul class="pagination m-0">
          <li class="page-item disabled ">
            <a class="page-link_ page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&lt;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item disabled "><a class="page-link_ page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link_ page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link_ page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link_ page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&gt;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>

    </div>
	</div>

<!-- main -->
<main>

<div class="container">
  <h2>What's new</h2>
  <div class="row">
    <?php
    //creation of cards with information from DB
        if ($result->num_rows > 0) {
          for($r = 1; $r <= 3; $r++){
            //only 9 cards for page => 3 rows
          echo '<div class="row row-cards" >';
          for ($x = 1; $x <= 3; $x++) {
            //only 3 cards on each row
            while($row = $result->fetch_assoc()) {

                echo('<div class="col-sm-4 product">'.
                        '<div class="card" >'.
                          '<a href="product-detail.php?var='.$row["item_id"].'">'.
                            '<img class="card-img-top" src="'.$row["url"].'">'.
                          '</a>'.
                          '<div class=" card-body d-flex align-items-center">'.
                            '<div class="text-left">'.
                              '<h6 class="card-title">'.$row["name"].'</h6>'.
                              '<p class="card-text" >AUD$ '.$row["price"].'</p>'.
                            '</div>'.
                            '<div class=" favourite-card ml-auto" >'.
                              '<i class="material-icons fav">favorite_border</i>'.
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
  <hr>
</div>
  <!-- Product grid -->
<div class="container">
  <h2>Find what you need</h2>
  <div class="row">
    <div  id="filters" class="col-sm-4">
      <?php include('assets/snippets/filters.php'); ?>
    </div>
    <div class="col-sm-8" >
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
    <script src="assets/js/account.js" type="text/javascript"></script>
    <script src="assets/js/filters.js" type="text/javascript"></script>

  <script>
    $(document).ready(function(){
      $('.fav').mouseenter(function(){
        $(this).text("favorite");
      });
      $('.fav').mouseleave(function(){
        $(this).text("favorite_border");
      });
    });
  </script>
</body>
</html>
