<?php
  require_once('db.php');

  $user_id = $_SESSION['user_id'];
  $sql_sidebar_items = "SELECT favourite.user_id as UID, item.item_id as ID, item.name as name, item.price as price, GROUP_CONCAT(DISTINCT image.url SEPARATOR '|') as url FROM favourite INNER JOIN item ON favourite.item_id = item.item_id INNER JOIN image ON item.item_id = image.item_id WHERE favourite.user_id = $user_id GROUP BY item.item_id";
  $result_sidebar_items = $connect->query($sql_sidebar_items);
  if ($result_sidebar_items->num_rows > 0) {
    while($row_fav_items = $result_sidebar_items->fetch_assoc()) {
      $images = explode("|", $row_fav_items['url']);
      $fav_item = <<<DELIMITER
      <div class="w-100">

        <a href="product-detail.php?var={$row_fav_items['ID']}">
          <img class="image" height="160px" src="{$images[0]}">
          {$row_fav_items['name']} {$row_fav_items['price']}
        </a>
     </div>
DELIMITER;
    echo $fav_item;
    }
  } else {
    echo "No results";
  }
?>
