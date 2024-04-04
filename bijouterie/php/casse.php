<?php
include 'connexion.php';
if (isset($_REQUEST['ajouter'])) {
    $lib = $_POST['lib'];
    $qt = $_POST['qt'];
    $pu = $_POST['pu'];
    $date = date('d-m-Y H:i:s');
    $user = $_SESSION["user"];
    
    $req = "INSERT INTO  casse VALUES ('$lib','$date','$qt','$pu','$user')";
    $res = mysqli_query($cnx, $req);
    if (mysqli_affected_rows($cnx) == -1)
        $message = "!!! Ajout echouée";
    else
        $message1 = "Ajout effectué avec succès";
    
}
mysqli_close($cnx);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/sidebar.js"></script>
    <link rel="stylesheet" href="../css/ajout.css">
    <script src="../js/controle1.js"></script>
    
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
                    <a href="#" class="nav_link" data-bs-toggle="collapse" data-bs-target="#aj"> <i class="bx bx-cart-add nav_icon"></i> <span class="nav_name active">Ajouter</span> </a>
                    <div id="aj" class="collapse">
                        <a href="ajout.php" class="nav_link"> <i class="bx bx-cart-add nav_icon"></i> <span class="nav_name">Produit</span> </a>
                        <a href="#" class="nav_link"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Casse</span> </a>
                    </div>
                    <a href="#" class="nav_link" data-bs-toggle="collapse" data-bs-target="#ls" > <i class="bx bx-purchase-tag-alt nav_icon"></i> <span class="nav_name">Vente</span> </a>
                    <div id="ls" class="collapse">
                    <a href="vente.php" class="nav_link"> <i class="bx bx-purchase-tag-alt nav_icon"></i> <span class="nav_name">Vente article</span> </a>
                        <a href="listevente.php" class="nav_link"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Liste</span> </a>
                        <a href="historiquevente.php" class="nav_link"> <i class='bx bx-history nav_icon' ></i> <span class="nav_name">Historique</span> </a>
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
    <div class="container w-50 bg-light  py-3  shadow">
        <h3 class="text-secondary w-100 text-center">Achat Casse</h3>
        <form method="post" class="w-75 m-auto">
            
            <div class="row">
                <div class="col">
                
                <div class="form-group">
                    <label for="pd" class="my-2">Libellé :</label>
                    <input type="text" id='pd' placeholder="Libellé" class="form-control" name="lib" required/>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="qt" class="my-2 ">Quantité :</label>
                        <input type="number" min="1" id='qt' placeholder="Quantité" class="form-control" name="qt" required/>
                    </div>
                    <div class="col">
                        <label for="pr" class="my-2 ">Prix :</label>
                        <input type="text" id='pu' placeholder="Prix" class="form-control" name="pu" required/>
                    </div>
                </div>
                <div class='w-100 my-3 text-center'><button type="submit" name="ajouter" class="btn btn-secondary" onclick="return verifcasse()">Ajouter</button></div>
                <?php
                if (!empty($message1)) {
                    echo "<p class='text-success h4'>" . $message1 . "</p>";
                }
                if (!empty($message)) {
                    echo "<p class='text-danger'>" . $message . "</p>";
                }
                
                ?>
        </form>

    </div>
    </div>


</body>

</html>