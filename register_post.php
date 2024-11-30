<?php 
session_start();

require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$confirm_password =$_POST['confirm_password'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('^[@,#,$,&,%,*]^', $password);

$flag = false;

if(empty($name)){
    $flag = true;
    $_SESSION['nam_err'] = 'Please Enter Your Name';
    
}
else{
    $_SESSION['nam_value'] = $name;
}
if(empty($email)){
    $flag = true;
    $_SESSION['email_err'] = 'Please Enter Your Email';
   
}
else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag = true;
        $_SESSION['email_err'] = 'Invalid Email Format';
    }
    else{
        $select = "SELECT COUNT(*) as total FROM users WHERE email='$email'";
        $select_query = mysqli_query($db_connect, $select);
        $select_result = mysqli_fetch_assoc($select_query);
        if($select_result['total'] != 0){
        $flag = true;
        $_SESSION['email_err'] = 'Email Already Exists';
        }
        else{
            $_SESSION['email_value'] = $email;
         }
   }
}
if(empty($password)){
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter Your Password';
   
}
else{
    if(!$upper || !$lower || !$number || !$spsl || strlen($password) < 8){
        $flag = true;
        $_SESSION['pass_err'] = 'Must contain atleast 1 uppercase, lowercase,number,special char & lenght should be >=8';
    }
}
if(empty($confirm_password)){
    $flag = true;
    $_SESSION['conpass_err'] = 'Please Enter Your Confirm Password';
   
}
else{
    if($password != $confirm_password){
        $flag = true;
        $_SESSION['conpass_err'] = 'password & confirm password does not match';
    }
}
if(empty($gender)){
    $flag = true;
    $_SESSION['gender_err'] = 'Please Select Gender';
}
else{
    $_SESSION['gen_value'] = $gender;
}
if(empty($dob)){
    $flag = true;
    $_SESSION['dob_err'] = 'Please Select Date of Birth';
}
else{
    $date = date('Y-m-d');
    $d1 = new DateTime($dob);
    $d2 = new DateTime($date);

    $diff = $d2->diff($d1);

    if($diff->y < 18){
        $flag = true;
        $_SESSION['dob_err'] = 'Age must require 18+'; 
    }
}
if($flag){
    header('location:register.php');
}
else{
    $insert = "INSERT INTO users( name, email, password, gender, dob) VALUES ('$name', '$email', '$after_hash', '$gender', '$dob')";

    mysqli_query($db_connect, $insert);

    $_SESSION['success'] = 'user registered succesfully';
    header('location:register.php');
}

?>