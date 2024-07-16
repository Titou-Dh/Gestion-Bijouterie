<?php
include 'connexion.php';
include_once('nav.php');
if (isset($_GET['numserie'])) {
    $numserie = $_GET['numserie'];
    $req1 = mysqli_query($cnx, "SELECT * FROM produit WHERE numserie='$numserie'") or die(mysqli_error($cnx));
    $prod = mysqli_fetch_array($req1);
    $pu = $prod['pu'];
    $poids = $prod['poids'];
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
                    <a href="Ajout.php" class="nav_link"> <i class="bx bx-cart-add nav_icon"></i> <span class="nav_name">Ajouter</span> </a>

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
            <h3 class="text-secondary w-100 text-center">Imprimer un produit</h3>
            <form method="post" class="w-75 m-auto">



                <div class="row">
                    <div class="col">
                        <label for="pd" class="my-2">Numéro de série :</label>
                        <input type="text" id='ns' class="form-control" name="ns" disabled value="<?php echo $numserie ?>">
                    </div>
                    <div class="col">
                        <label for="pd" class="my-2">Prix unitaire :</label>
                        <input type="text" class="form-control" name="" id='pu' disabled value="<?php echo $pu ?>">
                    </div>
                    <div class="col">
                        <label for="pd" class="my-2">Poids :</label>
                        <input type="text" id='poi' class="form-control" name="poids" disabled value="<?php echo $poids ?>">
                    </div>
                </div>
                <div class="row pt-4" id="div2" style="visibility: hidden; margin-top: 50px;">
                    <?php
                    echo 'NS ' . $numserie . '&nbsp &nbsp Poids ' . $poids;
                    ?>
                </div>

                <div class='w-100 my-3 text-center'><button id="imprimer" class="btn btn-secondary" href="impression.css" media="print">Imprimer</button></div>
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
    <script>
        // document.getElementById("imprimer").addEventListener("click", function() {
        //     var printContents = '<font class="" size="1px"><b>' + document.getElementById('div2').innerHTML + '</font></b>';
        //     var originalContents = document.body.innerHTML;
        //     document.body.innerHTML = printContents;

        //     // Add CSS styles for margin
        //     var style = document.createElement('style');
        //     style.innerHTML = '@page { margin: 20mm; }';
        //     document.head.appendChild(style);

        //     window.print();
        //     document.body.innerHTML = originalContents;
        //     document.head.removeChild(style); // Remove the added style after printing
        // });
        // document.getElementById("imprimer").addEventListener("click", function() {
        // var printContents= '<font size="1px" class="mt-3"><b>'+document.getElementById('div2').innerHTML+'</font></b>';
        // var originalContents = document.body.innerHTML;
        // document.body.innerHTML = printContents;
        // window.print();
        // document.body.innerHTML = originalContents;
        // });
        document.getElementById("imprimer").addEventListener("click", function() {
            var printContents = '<div  style="height:18.897637795px;display: flex; align-items: center;"><font size="1px"><b>' + document.getElementById('div2').innerHTML + '</font></b></div>';
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;

            var style = document.createElement('style');
            style.innerHTML = '@media print { @page { margin: 20mm; font- } }';
            document.head.appendChild(style);

            window.print();
            document.body.innerHTML = originalContents;
            document.head.removeChild(style);
        });
    </script>
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