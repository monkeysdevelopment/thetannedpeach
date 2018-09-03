<?php
  //require_once('assets/snippets/db.php');
  $product_number =  "01";
  $category = "tops";
  $images = glob("assets/images/product-images/$category/products_".$category."_".$product_number."*.*");
  echo count($images);
  echo "<br />";
  foreach ($images as $image) {
    echo $image."<br />";
    echo "<img src=$image height=150/><br />";
  }
?>
