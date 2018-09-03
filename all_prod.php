<?php
    require_once('assets/snippets/db.php');

    //get filters
    if( isset($_GET['sizes']) )
    {
      if( count($_GET['sizes']) > 0 )
      {
        $sizes = explode('-',$_GET['sizes']);
      }
    }

    if( isset($_GET['categories']) )
    {
      if( count($_GET['categories']) > 0 )
      {
        $categories = explode('-',$_GET['$categories']);
      }
    }

    $sql2 = "SELECT item.item_id as id, item.name as name,item.description as description, category.name as category, item.price as price, image.url as url FROM ((item INNER JOIN image ON item.item_id = image.item_id) INNER JOIN category ON category.cat_id = item.cat_id) WHERE url LIKE '%a.%'";
    if( $query = $connect->prepare($sql2) ){
      $query->execute();
      $result = $query->get_result();
      if ($result->num_rows > 0){
        while($item = $result->fetch_assoc()) {
      $product = <<<DELIMITER
      <div class="col-sm-4 product">
              <div class="card" >
                <a href="product-detail.php?var={$item['id']}">
                  <img class="card-img-top" src="{$item['url']}">
                </a>
                <div class=" card-body d-flex align-items-center">
                  <div class="text-left">
                    <h6 class="card-title">{$item['name']}</h6>
                    <p class="card-text" >AUD$ {$item['price']}</p>
                  </div>
                  <div class=" favourite-card ml-auto" >
                    <i class="material-icons fav">favorite_border</i>
                  </div>
                </div>
             </div>
           </div>
DELIMITER;

        echo $product;
        }
      }else{
        echo "No results";
      }
    }
 ?>
