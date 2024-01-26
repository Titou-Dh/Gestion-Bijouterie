<?php
include 'connexion.php';
include_once('nav.php');
if (isset($_REQUEST['catn'])) 
{
    $cat=$_GET['cat'];
    $catn=$_POST['catn'];
    if(!empty($cat))
      {
        $req1 = "UPDATE categorie set cat='$catn'where cat='$cat'";
        $res1 = mysqli_query($cnx, $req1) or die(mysqli_error($cnx));
        if (mysqli_affected_rows($cnx) == -1)
          $message = "!!! modification echouée";
        else
          $message2 = "La modification de la catégorie a été prise en compte !";
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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/bijouterie/js/sidebar.js"></script>
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
            <h3 class="text-secondary w-100 text-center">Modifier une catégorie</h3>
            <form method="post" class="w-75 m-auto">

                <div class="form-group">
                    <label for="pd" class="my-2">Catégorie :</label>
                    <input type="text" id='catn' placeholder="Catégorie" class="form-control" name='catn' required>
                </div>

                <div class='w-100 my-3 text-center'><button type="submit" name="ajouter" class="btn btn-secondary">Modifier</button></div>
                <?php
                    if (!empty($message)) {
                        echo "<p class='text-danger'>" . $message . "</p>";
                    }
                    if (!empty($message2)) {
                        echo "<p class='errorMessage'>" . $message2 . "</p>";
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


</body>

</html>