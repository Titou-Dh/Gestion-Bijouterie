<?php  
//export.php 
include 'connexion.php'; 

$output = '';

 $req = "SELECT * FROM produit";
 $result = mysqli_query($cnx, $req);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>N° serie</th>  
                         <th>Libellé</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["numserie"].'</td>  
                         <td>'.$row["libelle"].'</td>  
                         
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=produit.xls');
  echo $output;
 }

?>