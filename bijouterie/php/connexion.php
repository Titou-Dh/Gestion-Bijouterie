<?php 
session_start();
if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit();
}
$cnx = mysqli_connect("bijouterie-bijouterie.a.aivencloud.com", "avnadmin", "AVNS_enrJmg8-AUfkkoQdFys", "defaultdb", "21747");







