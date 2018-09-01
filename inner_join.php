<?php
  session_start();
  require_once('assets/snippets/db.php');

  if(isset($_GET['term'])){

      // Prepare a select statement
      $sql = "SELECT * FROM item WHERE name LIKE ?";
      //$sql2 = "SELECT * FROM ((item AS it INNER JOIN image AS im ON it.item_id = im.image_id) INNER JOIN category AS cat ON cat.cat_id = category.cat_id) WHERE name LIKE ?";
      if( $query = $connect->prepare($sql) ){

          // Bind variables to the prepared statement as parameters
          $query->bind_param('s', $param_term);

          // Set parameters
          $param_term = $_GET['term'];


          $param_term = $connect->real_escape_string($param_term);
          $param_term = '%'.$param_term.'%';
          // Attempt to execute the prepared statement

          $query->execute();
          $result = $query->get_result();

          // Check number of rows in the result set
          $row = $result->num_rows;

          if($row > 0){
            echo "<div class='product-suggestion'>";
            echo "<h2>Search result: </h2>";
            $cat = array("tops","dresses","skirts","pants","jackets","shoes","accessories");
            while($item = $result->fetch_assoc()){
            ?>

              <a class="product-link" href="#">

                <div class="product-image">
                <?php
                  //require_once('assets/snippets/db.php');
                  $product_number =  "01";
                  $category = $cat[ $item['cat_id'] - 1 ];
                  $images = glob("assets/images/product-images/$category/products_".$category."_".$product_number."*.*");
                ?>

                <img src="<?php echo $images[0]; ?>" height="120px" />

                </div>
                <div class="product-name"><h3><?php echo $item['name']; ?></h3></div>
                <div class="product-details">
                <div class="product-price">AUD $<?php echo $item['price']; ?></div>
                </div>
              </a>
            <?php
              }
              echo "</div>";
          } else{
              echo "<p>No matches found</p>";
          }

      }
  }
 ?>
