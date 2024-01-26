<?php
include 'connexion.php';
if (isset($_REQUEST['numserie'])){
$numserie=$_GET['numserie'];
if(!empty($numserie))
{
    $req="DELETE FROM produit where numserie='$numserie'";
    $res = mysqli_query($cnx, $req);
    header("Location: stock.php");
}

}
mysqli_close($cnx);
?>