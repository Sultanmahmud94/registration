<?php   
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM menus WHERE id=$id";
$select_menu_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_menu_res);

$delete = "DELETE FROM menus WHERE id=$id";
mysqli_query($db_connect, $delete);

header('location:menu.php');

?>