<?php   
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT status FROM skills WHERE id=$id";
$select_status_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_status_res);

if($after_assoc['status'] == 0){
    $update = "UPDATE skills SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:skill.php');
}
else{
    $update = "UPDATE skills SET status=0 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:skill.php');
}

?>