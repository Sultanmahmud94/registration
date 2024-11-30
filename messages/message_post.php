<?php   
session_start();
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$insert = "INSERT INTO messages(name, email, subject, message)VALUES('$name','$email', '$subject', '$message')";
mysqli_query($db_connect, $insert);
$_SESSION['success'] = 'message sent successfully';
header('location:../index.php?#message');


?>