<?php  
session_start();
require '../db.php';

$header_logo =$_FILES['header_logo'];
$footer_logo =$_FILES['footer_logo'];

$select_logo = "SELECT * FROM logos";
$select_logo_res = mysqli_query($db_connect, $select_logo);
$after_assoc = mysqli_fetch_assoc($select_logo_res);

if($_POST['logo'] == 1){
   $after_explode = explode('.', $header_logo['name']);
   $extension = end($after_explode);
   $allowed = ['png', 'jpg'];
   if(in_array($extension, $allowed)){
      $delete_from = '../uploads/logo/'.$after_assoc['header_logo'];
      unlink($delete_from);
      $file_name = uniqid().'.'.$extension;
      $new_location = '../uploads/logo/'. $file_name;
      move_uploaded_file($header_logo['tmp_name'], $new_location);

      $update = "UPDATE logos SET header_logo='$file_name'";
      mysqli_query($db_connect, $update);
      $_SESSION['logo_header'] = 'Header Logo Updated';
      header('location:logo.php');
   }
   else{
       $_SESSION['exten'] = 'Only png & jpg Format allowed';
       header('location:logo.php');
   }
}
else{
   $after_explode = explode('.', $footer_logo['name']);
   $extension = end($after_explode);
   $allowed = ['png'];
   if(in_array($extension, $allowed)){
      $delete_from = '../uploads/logo/'.$after_assoc['footer_logo'];
      unlink($delete_from);
      $file_name = uniqid().'.'.$extension;
      $new_location = '../uploads/logo/'. $file_name;
      move_uploaded_file($footer_logo['tmp_name'], $new_location);

      $update = "UPDATE logos SET footer_logo='$file_name'";
      mysqli_query($db_connect, $update);
      $_SESSION['logo_footer'] = 'Footer Logo Updated';
      header('location:logo.php');
   }
   else{
       $_SESSION['extent'] = 'Only png & jpg Format allowed';
       header('location:logo.php');
   }
}


?>