<?php
include 'connexion.php';
include_once('nav.php');
$req = "SELECT * FROM categorie";
$res = mysqli_query($cnx, $req) or die(mysqli_error($cnx));


if (isset($_GET['numserie'])) {
    $numserie = $_GET['numserie'];
    $req1 = mysqli_query($cnx, "SELECT * FROM produit WHERE numserie='$numserie'") or die(mysqli_error($cnx));
    $prod = mysqli_fetch_array($req1);
    $lib = $prod['libelle'];
    $qt = $prod['qte'];
    $pu = $prod['pu'];
    $poids = $prod['poids'];
}



if (isset($_REQUEST['modifier'])) {

    $cat = $_POST['categorie'];
    $lib = $_POST['lib'];
    $qt = $_POST['qt'];
    $pu = $_POST['pu'];
    $karat = $_POST['karat'];
    $poids = $_POST['poids'];
    $req2 = "UPDATE produit set libelle='$lib', qte='$qt', pu='$pu', poids='$poids',categorie='$cat', karat='$karat' where numserie='$numserie'";
    $res2 = mysqli_query($cnx, $req2) or die(mysqli_error($cnx));
    if (mysqli_affected_rows($cnx) == -1)
        $message = "!!! modification echouée";
    else
        header("Location: stock.php");
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-yJHzUg8xUprC6KnsIp6SBzLTFjKoIhSjZbxPTlZwzBnwASW8R4hz39y4A2/cdOkMkzKO2f1bZMzJZKNKpEVNGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-6o5U6HjL6yxydZfW1htXKjZBlYc/L7F47spzzWJn7hnBjLkivzWZQahIv7D1S+b6uXpdVgQy87uOF4w4Ab3qPw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                    <a href="#" class="nav_link"> <i class="bx bx-cart-add nav_icon"></i> <span class="nav_name">Ajouter</span> </a>

                    <a href="#" class="nav_link" data-bs-toggle="collapse" data-bs-target="#ls"> <i class="bx bx-purchase-tag-alt nav_icon"></i> <span class="nav_name">Vente</span> </a>
                    <div id="ls" class="collapse">
                        <a href="vente.php" class="nav_link"> <i class="bx bx-purchase-tag-alt nav_icon"></i> <span class="nav_name">Vente article</span> </a>
                        <a href="listevente.php" class="nav_link"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Liste</span> </a>
                        <a href="historiquevente.php" class="nav_link"> <i class='bx bx-history nav_icon'></i> <span class="nav_name">Historique</span> </a>
                    </div>
                    <a href="stock.php" class="nav_link"> <i class="bx bx-package nav_icon"></i> <span class="nav_name">Stock</span> </a>
                    <a href="reparation.php" class="nav_link"> <i class='bx bx-wrench'></i> <span class="nav_name">Reparation</span> </a>
                    <a href="listecategorie.php" class="nav_link"> <i class='bx bx-category-alt nav_icon'></i> <span class="nav_name">Catégorie</span> </a>
                    <a href="utilisateur.php" class="nav_link"> <i class="bx bx-user nav_icon"></i> <span class="nav_name">Users</span> </a>
                </div>
            </div> <a href="logout.php" class="nav_link" name="logout"> <i class="bx bx-log-out nav_icon"></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="fr">
        <div class="container w-50 bg-light  py-3  shadow">
            <h3 class="text-secondary w-100 text-center">Modifier un produit</h3>
            <form method="post" class="w-75 m-auto">

                <div class="row">
                    <div class="col">
                        <label for="pd" class="my-2">Catégorie :</label>
                        <select id="categorie" name="categorie" class='form-select'>
                            <option value="0" disabled selected>Selectionner une catégorie</option>
                            <?php
                            while ($r = mysqli_fetch_array($res)) {
                                echo '<option value="' . $r['cat'] . '">' . $r['cat'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="pd" class="my-2">Carat :</label>
                        <select class="form-select" id="karat" name="karat">
                            <option value="0" disabled selected>Sélectionner le Carat</option>
                            <option value="9">9</option>
                            <option value="18">18</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="pd" class="my-2">Numéro de série :</label>
                        <input type="text" id='ns' placeholder="Numéro de série" class="form-control" name="ns" disabled value="<?php echo $numserie ?>">
                    </div>
                    <div class="col">
                        <label for="pd" class="my-2">Poids :</label>
                        <input type="text" placeholder="Poids" class="form-control" name="poids" id='poi' value="<?php echo $poids ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="pd" class="my-2">Libellé :</label>
                    <input type="text" id='pd' placeholder="Libellé" class="form-control" name="lib" value="<?php echo $lib ?>" required />
                </div>
                <div class="row">
                    <div class="col">
                        <label for="qt" class="my-2 ">Quantité :</label>
                        <input type="number" min="1" id='qt' placeholder="Quantité" class="form-control" name="qt" value="<?php echo $qt ?>" required />
                    </div>
                    <div class="col">
                        <label for="pr" class="my-2 ">Prix :</label>
                        <input type="text" id='pu' placeholder="Prix" class="form-control" name="pu" value="<?php echo $pu ?>" required />
                    </div>
                    <div id="erreur"></div>
                </div>
                <div class='w-100 my-3 text-center'><button type="submit" name="modifier" class="btn btn-secondary" onclick="return verifajout()">Modifier</button></div>
                <?php
                if (!empty($message)) {
                    echo "<p class='text-danger'>" . $message1 . "</p>";
                }
                if (!empty($message2)) {
                    echo "<p class='text-success h4'>" . $message2 . "</p>";
                }

                ?>
            </form>

        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>