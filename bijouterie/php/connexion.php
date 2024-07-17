<?php 
session_start();
if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit();
}
// $cnx = mysqli_connect("localhost", "root", "", "bijouterie");

$cnx = mysqli_connect("sql206.infinityfree.com", "if0_36914670", "gfNPleBx2O", "if0_36914670_bijouterie");






