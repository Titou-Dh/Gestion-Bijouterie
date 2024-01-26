<?php
include 'connexion.php';
if (isset($_REQUEST['numserie'])){
$numserie=$_GET['numserie'];
if(!empty($numserie))
{
    $req="DELETE FROM stock0 where numserie='$numserie'";
    $res = mysqli_query($cnx, $req);
    header("Location: stock0.php");
}

}
mysqli_close($cnx);
?>