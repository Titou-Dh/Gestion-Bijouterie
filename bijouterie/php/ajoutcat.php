<?php
include 'connexion.php';
if (isset($_REQUEST['ajouter'])) {
    $cat = $_POST['cat'];
    $req = "SELECT * FROM categorie WHERE cat ='$cat'";
    $res = mysqli_query($cnx, $req) or die(mysqli_error($cnx));
    if (mysqli_num_rows($res) > 0)
        $message1 = "!!! Catégorie existe dans la base";
    else {
        $req1 = "INSERT INTO  categorie VALUES ('$cat')";
        $res1 = mysqli_query($cnx, $req1);
        if (mysqli_affected_rows($cnx) == -1)
            $message2 = "Ajout echouée";
        else
            $message3 = "Ajout effectué avec succès";
        
    }
}

mysqli_close($cnx);
?>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/bijouterie/css/main.css">
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
                    <a href="ajout.php" class="nav_link" > <i class="bx bx-cart-add nav_icon"></i> <span class="nav_name active">Ajouter</span> </a>
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



    <link rel="stylesheet" href="/bijouterie/css/ajout.css">
    <div class="fr resp">
        <div class="container w-50 bg-light  py-3  shadow">
            <h3 class="text-secondary w-100 text-center">Ajouter une catégorie</h3>
            <form method="post" class="w-75 m-auto">

                <div class="form-group">
                    <label for="pd" class="my-2">Catégorie :</label>
                    <input type="text" id='cat' placeholder="Catégorie" class="form-control" name='cat' required>
                </div>

                <div class='w-100 my-3 text-center'><button type="submit" name="ajouter" class="btn btn-secondary" onclick="return verifcat();">Ajouter</button></div>
                <?php
                if (!empty($message1)) {
                    echo "<p class='text-danger'>" . $message1 . "</p>";
                }
                if (!empty($message2)) {
                    echo "<p class='text-success h4'>" . $message2 . "</p>";
                }
                
                ?>
            </form>

        </div>
    </div>
    <div class="custom-shape-divider-bottom-1678302607">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M892.25 114.72L0 0 0 120 1200 120 1200 0 892.25 114.72z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success-emphasis" id="successModalLabel">Ajout effectué avec succès</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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