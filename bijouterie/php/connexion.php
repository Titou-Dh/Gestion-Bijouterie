<?php 
session_start();
if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit();
}
$cnx = mysqli_connect("localhost", "root", "", "bijouterie");







