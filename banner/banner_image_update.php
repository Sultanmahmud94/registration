<?php  

session_start();
require '../db.php';

$select_banner = "SELECT image FROM banners";
$select_banner_res = mysqli_query($db_connect, $select_banner);
$after_assoc_banner = mysqli_fetch_assoc($select_banner_res);

$image = $_FILES['image'];
$after_explode = explode('.',$image['name']);
$extension = end($after_explode);

$file_name = uniqid().'.'.$extension;

$delete_from = '../uploads/banner/'.$after_assoc_banner['image'];
unlink($delete_from);

$new_location = '../uploads/banner/'.$file_name;
move_uploaded_file($image['tmp_name'], $new_location);

$update = "UPDATE banners SET image='$file_name'";
mysqli_query($db_connect, $update);

$_SESSION['image_update'] = 'Banner Image Updated Successfully';
header('location:banner.php');

?>