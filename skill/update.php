<?php   
session_start();
require '../db.php';

$id = $_POST['id'];
$skill_name = $_POST['skill_name'];
$percentage = $_POST['percentage'];

$update = "UPDATE skills SET skill_name='$skill_name', percentage='$percentage' WHERE id=$id";
mysqli_query($db_connect, $update);
header('location:skill.php');

?>