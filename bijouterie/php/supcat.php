<?php
include 'connexion.php';
if (isset($_REQUEST['cat'])){
$cat=$_GET['cat'];
if(!empty($cat))
{
    $req="DELETE FROM categorie where cat='$cat'";
    $res = mysqli_query($cnx, $req);
    header("Location: listecategorie.php");
}

}
mysqli_close($cnx);
?>