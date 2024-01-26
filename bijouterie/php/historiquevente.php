<?php
include 'connexion.php';
$req = "SELECT * FROM vente 
        ORDER BY datev";
$res = mysqli_query($cnx, $req);

?>

<link href="/bijouterie/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="/bijouterie/css/sb-admin-2.min.css" rel="stylesheet">




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
    <div class="container-fluid mt-5 pt-5">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 w-100 text-center">Historique des ventes</h1>


        <!-- DataTales Example -->
        <form method="POST">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class='w-100 my-3 text-center'>
                <label class="m-0 font-weight-bold text-primary">Date début :<input type="date" name="datedeb"></input>
                <label class="m-0 font-weight-bold text-primary">Date fin :<input type="date" name="datefin"></input>
                <button type="submit" name="rech" class="btn btn-secondary">recherche</button>
            </div>
            </div>
            
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>N° Serie</th>
                                <th>Quantité</th>
                                <th>Prix de vente</th>
                                <th>Date</th>
                                <th>Utilisateur</th>

                            </tr>
                        </thead>
                      
                        <?php
                        
                        if (isset($_REQUEST['rech'])) 
                        {   $datedeb = $_POST['datedeb'];
                            $datefin = $_POST['datefin'];
                            $datedeb=substr($datedeb,8)."-".substr($datedeb,5,2)."-".substr($datedeb,0,4);
                            $datefin=substr($datefin,8)."-".substr($datefin,5,2)."-".substr($datefin,0,4);
                            $req1 = "SELECT * FROM vente where datev >= '$datedeb' 
                                    and datev<'$datefin'+1
                                    order by datev";
                            $res1 = mysqli_query($cnx, $req1);                      
                            while ($prod1 = mysqli_fetch_array($res1)) {
                                echo '
                                <tr>
                                    <td>' . $prod1["numserie"] . '</td>
                                    <td>' . $prod1["qtv"] . '</td>
                                    <td>' . $prod1["pv"] . '</td>
                                    <td>' . $prod1["datev"] . '</td>
                                    <td>' . $prod1["user"] . '</td>
                                </tr>
                                ';
                            }
                        }
                        else
                        {
                            while ($prod = mysqli_fetch_array($res)) {
                                echo '
                                <tr>
                                    <td>' . $prod["numserie"] . '</td>
                                    <td>' . $prod["qtv"] . '</td>
                                    <td>' . $prod["pv"] . '</td>
                                    <td>' . $prod["datev"] . '</td>
                                    <td>' . $prod["user"] . '</td>
                                </tr>
                                ';
                            }
                        }
                        mysqli_close($cnx);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </form>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="/bijouterie/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/bijouterie/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/bijouterie/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/bijouterie/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/bijouterie/js/datatables-demo.js"></script>