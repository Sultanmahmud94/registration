<?php   
session_start();
require '../db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$image = $_FILES['image'];

$select = "SELECT * FROM portfolios WHERE id=$id";
$select_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($image['name'] == ''){
     $update = "UPDATE portfolios SET title='$title', category='$category' WHERE id=$id";
     mysqli_query($db_connect, $update);
     header('location:portfolio.php');
}
else{
    $after_explode = explode('.', $image['name']);
    $extension = end($after_explode);
    $file_name = uniqid().'.'.$extension;

    $delete_from = '../uploads/portfolio/'.$after_assoc['image'];
    unlink($delete_from);

    $new_location = '../uploads/portfolio/'.$file_name;
    move_uploaded_file($image['tmp_name'], $new_location);

    $update = "UPDATE portfolios SET title='$title', category='$category', image='$file_name' WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:portfolio.php');
}
?>