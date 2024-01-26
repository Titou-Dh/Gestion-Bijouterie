<?php
include 'connexion.php';
if(isset($_GET['pr'])){
    $produit=(string) trim($_GET['pr']);
    $req1 = "SELECT* FROM produit 
            WHERE numserie LIKE '$produit'";
    $res1 = mysqli_query($cnx, $req1);
}
while ($r = mysqli_fetch_array($res1)) {
    echo "
        <div class='col-6'>
        <label for='lib' class='my-2'>Libellé :</label>
        <input type='text' id='lib' class='form-control' name='lib'  disabled value=".$r['libelle'].">
        </div>";
        if($r['qte']>10){
            echo"<div class='col-3'>
            <label for='qte' class='my-2'>Quantité en stock:</label>
            <input type='text' id='qte' class='form-control' name='qte' disabled value=".$r['qte'].">
            </div>";
        }
        else{
            echo"<div class='col-3'>
            <label for='qte' class='my-2'>Quantité en stock:</label>
            <input type='text' id='qte' class='form-control bg-danger' name='qte'  disabled value=".$r['qte'].">
            </div>";
        }
                            
        echo" <div class='col-3'>
            <label for='pu' class='my-2'>Prix d'Achat :</label>
            <input type='text' id='pu' class='form-control' name='pu' disabled value=".$r['pu'].">DT
            </div>";
                    
                        
}

mysqli_close($cnx);
?>