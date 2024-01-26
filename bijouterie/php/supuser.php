<?php
include 'connexion.php';
if (isset($_REQUEST['user'])){
$user=$_GET['user'];
if(!empty($user))
{
    $req="DELETE FROM utilisateur where user='$user'";
    $res = mysqli_query($cnx, $req);
    header("Location: utilisateur.php");
}

}
mysqli_close($cnx);
?>