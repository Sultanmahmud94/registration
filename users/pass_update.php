<?php

session_start();
require '../db.php';

$id = $_SESSION['logged_id'];
$logged = "SELECT * FROM users WHERE id=$id";
$logged_user = mysqli_query($db_connect, $logged);
$logged_info = mysqli_fetch_assoc($logged_user);

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$hash_pass = password_hash($new_password, PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];

$flag = false;

if(empty($current_password)){
    $flag = true;
    $_SESSION['current_pass'] = 'Enter Current Password ';
}
else{
    if(!password_verify($current_password, $logged_info['password'])){
    $flag = true;
    $_SESSION['current_pass'] = 'Current Password does not Match';
    }
}
if(empty($new_password)){
    $flag = true;
    $_SESSION['new_pass'] = 'Enter New Password ';
}
if(empty($confirm_password)){
    $flag = true;
    $_SESSION['con_pass'] = 'Enter Confirm Password ';
}
else{
    if($new_password != $confirm_password){
        $flag = true;
        $_SESSION['con_pass'] = 'New Password & Confirm password not Matched';
    }
}



if($flag){
    header('location:edit_profile.php');
}
else{
    $update = "UPDATE users SET password='$hash_pass' WHERE id=$id";
    mysqli_query($db_connect, $update);
    $_SESSION['pass'] = 'Password Updated!';
    header('location:edit_profile.php');
}

?>