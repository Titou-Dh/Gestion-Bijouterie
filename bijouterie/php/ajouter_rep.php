<?php
include 'connexion.php';

if(isset($_REQUEST['ajouter'])){
    $categorie = $_POST['categorie'];
    $karat = $_POST['karat'];
    $ns = $_POST['ns'];
    $poids = $_POST['poids'];
    $lib = $_POST['lib'];
    $qt = $_POST['qt'];
    $pu = $_POST['pu'];
    $date = date('d-m-Y H:i:s');
    $user = $_SESSION["user"];
    $req1 = "SELECT * FROM reparation WHERE numserie ='$ns'";
    $res1 = mysqli_query($cnx, $req1);
    $row = mysqli_fetch_array($res1);
    if (mysqli_num_rows($res1) != 0)
        $message1 = "!!! Numéro de série existe déjà";
    else {
        $req2 = "insert into reparation values('$ns','$lib','$qt','$pu','$poids','$categorie','$karat','$date','$user')";
        $res2 = mysqli_query($cnx, $req2);
        if(mysqli_affected_rows($cnx) == -1)
            $message2 = "Opération echouée";
        else {
            $message3 = "Ajout effectué avec succée";
        }
    }
    
    
}


$req = "SELECT * FROM categorie";
$res = mysqli_query($cnx, $req) or die(mysqli_error($cnx));

mysqli_close($cnx);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-yJHzUg8xUprC6KnsIp6SBzLTFjKoIhSjZbxPTlZwzBnwASW8R4hz39y4A2/cdOkMkzKO2f1bZMzJZKNKpEVNGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-6o5U6HjL6yxydZfW1htXKjZBlYc/L7F47spzzWJn7hnBjLkivzWZQahIv7D1S+b6uXpdVgQy87uOF4w4Ab3qPw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
                    <a href="ajout.php" class="nav_link"> <i class="bx bx-cart-add nav_icon"></i> <span class="nav_name">Ajouter</span> </a>
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
    <article>

        <div class="fr">
            <div class="container bg-light  py-3  shadow">
                <h3 class="text-secondary w-100 text-center">Ajouter un produit</h3>
                <div class="row split">
                    <div class="col-md-5 m-auto">
                        <form method="post" class=" m-auto">

                            <div class="row ">
                                <div class="col">
                                    <label for="pd" class="my-2">Catégorie :</label>
                                    <select id="categorie" name="categorie" class='form-select' required>
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
                                        <option value="24">24</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="pd" class="my-2">Numéro de série :</label>
                                    <input type="text" id='ns' placeholder="Numéro de série" class="form-control" name="ns">
                                </div>
                                <div class="col">
                                    <label for="pd" class="my-2">Poids :</label>
                                    <input type="text" placeholder="Poids" class="form-control" name="poids" id='poi'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pd" class="my-2">Libellé :</label>
                                <input type="text" id='pd' placeholder="Libellé" class="form-control" name="lib">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="qt" class="my-2 ">Quantité :</label>
                                    <input type="number" min="1" id='qt' placeholder="Quantité" class="form-control" name="qt">
                                </div>
                                <div class="col">
                                    <label for="pr" class="my-2 ">Prix de reparation :</label>
                                    <input type="text" id='pu' placeholder="Prix" class="form-control" name="pu">
                                </div>
                                <div id="erreur"></div>
                            </div>
                            <div class='w-100 my-3 text-center'>
                                <button type="submit" name="ajouter" class="btn btn-secondary" onclick="return verifajout()">Ajouter</button>
                            </div>

                            <?php
                            if (!empty($message1)) {
                                echo "<p class='text-danger'>" . $message1 . "</p>";
                            }
                            if (!empty($message2)) {
                                echo "<p class='text-danger'>" . $message2 . "</p>";
                            }

                            if (!empty($message4)) {
                                echo "<p class='text-danger'>" . $message4 . "</p>";
                            }
                            if (!empty($message5)) {
                                echo "<p class='text-danger'>" . $message5 . "</p>";
                            }
                            ?>
                        </form>
                    </div>


                    <div id="div2" style=" font-size:10px;">

                        <?php
                        if (!empty($message3)) {
                            echo 'N°serie ' . $ns . ' Prix ' . $pu . 'DT Poids ' . $poids . 'Gr';
                        }
                        ?>
                    </div>

                    <script>
                        document.getElementById("imprimer").addEventListener("click", function() {
                            var printContents = document.getElementById('div2').innerHTML;
                            var originalContents = document.body.innerHTML;
                            document.body.innerHTML = printContents;
                            window.print();
                            document.body.innerHTML = originalContents;
                        });
                    </script>




                </div>


            </div>
        </div>
        </div>
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success-emphasis" id="successModalLabel">Ajout effectué avec succée</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <?php if (isset($message3)) : ?>
                            <p><?= $message3 ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>

                    </div>
                </div>
            </div>
        </div>
        <script>
            <?php if (isset($message3)) : ?>
                $('#successModal').modal('show');
            <?php endif; ?>
        </script>

</body>

</html>