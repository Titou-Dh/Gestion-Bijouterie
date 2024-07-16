
<?php
include 'connexion.php';
if (isset($_REQUEST['nums'])){
$numserie=$_GET['nums'];
if(!empty($numserie))
{
    $req="DELETE FROM reparation where numserie='$numserie'";
    $res = mysqli_query($cnx, $req);
    header("Location: reparation.php");
}

}
mysqli_close($cnx);
?>