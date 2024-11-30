<?php
session_start();
require '../db.php';

$id = $_SESSION['logged_id'];
$name = $_POST['name'];
$photo = $_FILES['photo'];

if($photo['name']== ''){
   $update = "UPDATE users SET name='$name' WHERE id=$id";
   mysqli_query($db_connect, $update);
   header('location:edit_profile.php');
}
else{
    $after_explode = explode('.', $photo['name']);
    $extension = end($after_explode);
    $allowed_extension = array('png','jpg');
    if(in_array($extension, $allowed_extension)){
       if($photo['size'] <= 1000000){
         $file_name = uniqid().'.'.$extension;
         $new_location = '../uploads/user/' .$file_name;
         move_uploaded_file($photo['tmp_name'], $new_location);

         $update = "UPDATE users SET name='$name', photo='$file_name' WHERE id=$id";
         mysqli_query($db_connect, $update);

         $_SESSION['success'] = 'Profile Updated Successfully';

         header('location:edit_profile.php');
       }
       else{
         $_SESSION['extension'] = 'Image size Maximum 1MB';
         header('location:edit_profile.php');
       }
    }
    else{
         $_SESSION['extension'] = 'Only Png & Jpg format are allowed';
         header('location:edit_profile.php');
    } 
}
?>