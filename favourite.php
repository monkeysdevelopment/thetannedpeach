<?php
  require_once('assets/snippets/db.php');

    $item_id = $_GET['item_id'];
    $user_id = $_GET['user_id'];
    echo "ITEM: ".$item_id." USER: $user_id";
    $sql_fav = "INSERT INTO favourite (item_id, user_id) VALUES ($item_id, $user_id)";

    if ($connect->query($sql_fav) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql_fav . "<br>" . $connect->error;
    }
?>
