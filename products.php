<?php

session_start();

  if( isset($_SESSION['fname']) )
    {
      if( count($_SESSION['fname']) > 0 )
      {
        $logged = true;
      } else {
        $logged = false;
      }
    } else {
      $logged = false;
    }
?>


 <?php
//DB connection and query for no filters
  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', '');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'verde');
  $connect = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  //retriving cards info
    $sql="SELECT  item.item_id, item.name, item.price, image.url FROM item INNER JOIN image ON image.item_id = item.item_id WHERE image.url LIKE '%01a%' AND is_new = 1";
    $result = mysqli_query($connect, $sql);
    $sql2="SELECT  image.url FROM item INNER JOIN image ON image.item_id = item.item_id WHERE image.url LIKE '%01b%' AND is_new = 1";
    $result2 = mysqli_query($connect, $sql2);
    $sqlAll = "SELECT item.item_id as id, item.name as name,item.description as description, category.name as category, item.price as price, image.url as url FROM ((item INNER JOIN image ON item.item_id = image.item_id) INNER JOIN category ON category.cat_id = item.cat_id) WHERE url LIKE '%a.%'";
    $resultAll =  mysqli_query($connect, $sqlAll);
 ?> 

<!DOCTYPE html>
<html  lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/productsPage.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantata+One|Roboto|Material+Icons" />
  
  
  
  
  <title>Verde - Products</title>
  
</head>
  
  
<body class="parallax">

<header class=" header">
  <!-- navbar -->
 <?php include('assets/snippets/navbar.php'); ?>
  <br>
	<div id="beginning_space"></div>
  <div class="d-flex align-items-center">

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

      <!-- <nav aria-label="Page navigation example">
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
      </nav>-->
      
    </div>
	</div>
</header>
  
  
  
<!-- main -->  
<main class="bg-transparent d-flex align-items-center col-sm-10">
  
	<!-- Filters -->
	<div  class="bg-transparent text-left">
     <?php include('assets/snippets/filters.php'); ?>  
  </div>
  <!-- Product grid -->
	<div id="products-id" class="bg-transparent products-grid pr-0 ml-auto" >  
<?php $n=0;
//creation of cards with information from DB
    if ($result->num_rows > 0) {
      for($r = 1; $r <= 3; $r++){
        //only 9 cards for page => 3 rows
      echo '<div class="row row-cards" >';
      for ($x = 1; $x <= 3; $x++) {
        //only 3 cards on each row
        while(($row = $result->fetch_assoc())&&($row2 = $result2->fetch_assoc()) ){
          $n++;
            echo('<div class="col-sm-4">'.
                    '<div class="card" >'.
                      '<a href="product-detail.php?var='.$row["item_id"].'">');?>
                          <img onmouseover="this.src='<?php echo $row2["url"]; ?>';" onmouseout="this.src='<?php echo $row["url"]; ?>';" class="card-img-top" src=" <?php echo $row["url"]; ?>">
          <?php echo ('</a>'.
                      '<div class=" card-body d-flex align-items-center">'.
                        '<div class="text-left">'.
                          '<a class="a_title" href="product-detail.php?var='.$row["item_id"].'">'.
                            '<h6 onmouseover="EnlargeFont(this)" onmouseout="BackToFont(this)" class="card-title">'.$row["name"].'</h6>'.
                          '</a>'.
                          '<p class="card-text" >AUD$ '.$row["price"].'</p>'.	
                        '</div>'.
                        '<div class=" favourite-card ml-auto" onmouseover= "FavouriteHeartChange('.$n.')"  onmouseout= "FavouriteHeartChangeBack('.$n.')">'.
                          '<i class="material-icons heart1 heart_not_filled'.$n.'">favorite_border</i>'.            
                          '<i class="material-icons heart2 heart_filled'.$n.'">favorite</i>'.            
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
  
    
	
		<br>
	</div>

</main>

  
  <!-- Footer -->
  
  <!-- Newsletter content over -->
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
      $('.heart2').hide();
      $('.heart1').show();
    });
  function FavouriteHeartChange(n){
      $(document.getElementsByClassName("heart_filled"+n)).show();
      $(document.getElementsByClassName("heart_not_filled"+n)).hide(); 
  }
  function FavouriteHeartChangeBack(n){
      $(document.getElementsByClassName("heart_filled"+n)).hide();
      $(document.getElementsByClassName("heart_not_filled"+n)).show(); 
  }  
  function EnlargeFont(title_to_enlarge){
    $(title_to_enlarge).css({"font-size": "125%"});
  }  
  function BackToFont(title_to_enlarge){
    $(title_to_enlarge).css({"font-size": "100%"});
  }  
  </script>
  
</body>
</html>
