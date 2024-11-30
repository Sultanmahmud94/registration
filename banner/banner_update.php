<?php  
session_start();
require '../db.php';

$title = $_POST['title'];
$name = $_POST['name'];
$watermark = $_POST['watermark'];
$short_desp = $_POST['short_desp'];

$update = "UPDATE banners SET title = '$title', name = '$name', watermark ='$watermark', short_desp ='$short_desp'";
mysqli_query($db_connect, $update);

$_SESSION['success'] = 'Banner Updated Successfully';
header('location:banner.php');

?>