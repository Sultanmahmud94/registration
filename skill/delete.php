<?php   
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT status FROM skills WHERE id=$id";
$select_status_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_status_res);

if($after_assoc['status'] == 0){
    $delete = "DELETE FROM skills WHERE id=$id";
    mysqli_query($db_connect, $delete);
    $_SESSION['del'] = 'skill deleted!';
    header('location:skill.php');
}
else{
    $_SESSION['active'] = 'you can not delete active skill';
    header('location:skill.php');
}

?>