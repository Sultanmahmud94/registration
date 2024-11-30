<?php   
session_start();
require '../db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$short_desp = $_POST['short_desp'];

$update = "UPDATE services SET title='$title', short_desp='$short_desp' WHERE id=$id";
mysqli_query($db_connect, $update);
header('location:service.php');

?>