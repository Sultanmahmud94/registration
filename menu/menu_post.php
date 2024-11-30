<?php   
session_start();
require '../db.php';

$menu_name = $_POST['menu_name'];
$link = $_POST['link'];

$insert = "INSERT INTO menus(menu_name, link)VALUES('$menu_name', '$link')";
mysqli_query($db_connect, $insert);

header('location:menu.php');


?>