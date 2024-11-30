<?php 
session_start(); 

require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$flag = false;

if(empty($email)){
    $flag = true;
    $_SESSION['email_err'] = 'Enter Email';
    
}
else{
    $select = "SELECT COUNT(*) as total FROM users WHERE email='$email'";
    $select_query = mysqli_query($db_connect, $select);
    $select_result = mysqli_fetch_assoc($select_query);
    if($select_result['total'] == 0){
        $flag = true;
        $_SESSION['email_err'] = 'Email does not Exists';
    }
}
if(empty($password)){
    $flag = true;
    $_SESSION['pass_err'] = 'Enter Password';
    
}
else{
    $select = "SELECT * FROM users WHERE email='$email'";
    $select_query = mysqli_query($db_connect, $select);
    $select_result = mysqli_fetch_assoc($select_query);
    if(!password_verify($password, $select_result['password'])){
        $flag = true;
        $_SESSION['pass_err'] = 'password incorrect';
    }
    else{
        $_SESSION['logged_id'] = $select_result['id'];
    }
}
if($flag){
    header('location:login.php');
}
else{
    $_SESSION['login_success'] = 'Login success';
    header('location:dashboard.php');
}

?>