<?php
  session_start();
  require_once('assets/snippets/db.php');

  header("Content-Type: text/plain");

  if ($connect->connect_error)
  {
    die("Connection failed".$connect->connect_error);
  }

  $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
  if($query = $connect->prepare($sql)){

    $query->bind_param("ss", $email, $password);
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $query->execute();
    $result = $query->get_result();
    $row = $result->num_rows;

    if($row > 0){
      $user = $result->fetch_assoc();
      $_SESSION['fname'] = $user['fname'];
      header("Location: index.php");
    }else {
      echo 'no';
    }
  }
  $connect->close();
  
  mysqli_close($connect);
 ?>
