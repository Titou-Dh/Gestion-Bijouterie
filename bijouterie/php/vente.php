<?php
include 'connexion.php';
if (isset($_REQUEST['vendre'])) {
    $ns = $_POST['ns'];
    $qv = $_POST['qv'];
    $pv = $_POST['pv'];
    $date = date('d-m-Y H:i:s');

    $user = $_SESSION["user"];

    $req1 = "SELECT* FROM produit WHERE numserie ='$ns'";
    $res1 = mysqli_query($cnx, $req1);
    $row = mysqli_fetch_array($res1);
    if (mysqli_num_rows($res1) == 0)
        $message1 = "!!! Vérifier le numéro de série";
    else {
        $pv = $pv * $qv;
        $req3 = "INSERT INTO  vente (numserie,pv,qtv,datev,user) VALUES ('$ns','$pv','$qv','$date','$user')";
        $res3 = mysqli_query($cnx, $req3);
        if (mysqli_affected_rows($cnx) == -1)
            $message2 = "Opération echouée";
        else {
            $req2 = "UPDATE produit set qte=qte-$qv 
                    WHERE numserie='$ns'";
            $res2 = mysqli_query($cnx, $req2);
            header("Location: listevente.php");
        }
    }
    $date = date('d-m-Y H:i:s');
    $req2 = "SELECT * FROM produit where qte=0";
    $res2 = mysqli_query($cnx, $req2);
    while ($prod = mysqli_fetch_array($res2)) {
        $numserie=$prod["numserie"];
        $libelle=$prod["libelle"];
        $qte=$prod["qte"];
        $pu=$prod["pu"];
        $categorie=$prod["categorie"];
        $karat=$prod["karat"];
        $poids=$prod['poids'];
    
        $req3="INSERT into stock0 values('$numserie','$libelle','$qte','$pu','$poids','$categorie','$karat','$date')";
        $res3 = mysqli_query($cnx, $req3);}
    $req4="DELETE FROM produit WHERE qte=0";
    $res4 = mysqli_query($cnx, $req4);

}
mysqli_close($cnx);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/bijouterie/css/main.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/bijouterie/js/sidebar.js"></script>
    <link rel="stylesheet" href="/bijouterie/css/ajout.css">
    <script src="/bijouterie/js/controle1.js"></script>
</head>

<body id="body-pd">
    <header class="header shadow hd" id="header">
        <div class="header_toggle"> <i class="bx bx-menu" id="header-toggle"></i>Menu </div>

    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class="bx bx-layer nav_logo-icon"></i> <span class="nav_logo-name">Gestion Bijouterie</span> </a>
                <div class="nav_list">
                    <a href="listevente.php" class="nav_link"> <i class="bx bx-grid-alt nav_icon"></i><span class="nav_name">Dashboard</span> </a>
                    <a href="ajout.php" class="nav_link"> <i class="bx bx-cart-add nav_icon"></i> <span class="nav_name active">Ajouter</span> </a>
                    
                    <a href="#" class="nav_link" data-bs-toggle="collapse" data-bs-target="#ls"> <i class="bx bx-purchase-tag-alt nav_icon"></i> <span class="nav_name">Vente</span> </a>
                    <div id="ls" class="collapse">
                        <a href="vente.php" class="nav_link"> <i class="bx bx-purchase-tag-alt nav_icon"></i> <span class="nav_name">Vente article</span> </a>
                        <a href="listevente.php" class="nav_link"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Liste</span> </a>
                        <a href="historiquevente.php" class="nav_link"> <i class='bx bx-history nav_icon'></i> <span class="nav_name">Historique</span> </a>
                    </div>
                    <a href="stock.php" class="nav_link"> <i class="bx bx-package nav_icon"></i> <span class="nav_name">Stock</span> </a>
                    <a href="listecategorie.php" class="nav_link"> <i class='bx bx-category-alt nav_icon'></i> <span class="nav_name">Catégorie</span> </a>
                    <a href="utilisateur.php" class="nav_link"> <i class="bx bx-user nav_icon"></i> <span class="nav_name">Users</span> </a>
                </div>
            </div> <a href="logout.php" class="nav_link" name="logout"> <i class="bx bx-log-out nav_icon"></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="fr">
        <div class="container w-75 bg-light  py-3  shadow">
            <h3 class="text-secondary w-100 text-center">Vente d'un article</h3>
            <form method="post" class="w-75 m-auto">

                <div class="form-group">

                </div>
                <div class="row my-5">
                    <div class="col-6">
                        <label for="pd" class="my-2">Numéro de série :</label>
                        <input type="text" id='ns' onkeyup="return recherche(this.value);" placeholder="Numéro de série" class="form-control" name="ns" required />
                    </div>

                    <div class="col-3">
                        <label for="pv" class="my-2">Prix de vente :</label>
                        <input type="text" id='pv' placeholder="prix de vente" class="form-control" name="pv" required />
                    </div>
                    <div class="col-3">
                        <label for="pv" class="my-2">Quantité :</label>
                        <input type="number" min="1" id='qv' placeholder="Quantité" class="form-control" name="qv" required />
                    </div>
                </div>
                <div id="resultat" class='row'></div>
                <div class="text-center">
                    <div class='w-100 my-3 text-center'><button type="submit" name="vendre" class="btn btn-secondary" onclick="return verifvente()">Vendre</button></div>
                </div>

                <?php
                if (!empty($message1)) {
                    echo "<p class='text-danger'>" . $message1 . "</p>";
                }
                if (!empty($message2)) {
                    echo "<p class='text-danger'>" . $message2 . "</p>";
                }

                ?>

            </form>

        </div>
    </div>

    <script>
        function recherche(s) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("resultat").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "recherche_produit.php?pr=" + s, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>