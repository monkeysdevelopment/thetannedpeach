<?php


require('db.php');


extract($_POST);


$sql = "INSERT into contactus (name,email,message,created_date) VALUES('" . $name . "','" . $email . "','" . $message . "','" . date('Y-m-d') . "')";


$success = $mysqli->query($sql);


if (!$success) {
    die("Submission failed, please try again.".$mysqli->error);
}


echo "Thank You For contacting us, our customer servicing team will get in touch with you ASAP. ";


$conn->close();


?>