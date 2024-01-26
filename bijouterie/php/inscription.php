<?php
include 'connexion.php';
include_once('nav.php');
if (isset($_REQUEST['user'], $_REQUEST['pass'])) {
    if ($_POST['pass'] == $_POST['passconf']) {
        $user = stripslashes($_REQUEST['user']);
        $user = mysqli_real_escape_string($cnx, $user);

        $pass = stripslashes($_REQUEST['pass']);
        $pass = mysqli_real_escape_string($cnx, $pass);

        $email=$_POST['email'];
        $niv=$_POST['niv'];
        
        $req1 = "SELECT* FROM utilisateur WHERE user='$user'";
        $res1 = mysqli_query($cnx, $req1);
        
        if (mysqli_num_rows($res1) > 0)
            $message = "!!! Nom d'utilisateur existe déjà";
        else {
            $req2 = "INSERT into utilisateur VALUES ('$user','$email','".hash('sha256', $pass)."', '$niv' )";
            $res2 = mysqli_query($cnx, $req2);
            if (mysqli_affected_rows($cnx) == -1)
                $message3 = "!!! Inscription echouée";
            else
                $message2 = "Utilisateur ajouté avec succès.";
            
        }
    } else {
        $message1 = "!!! Les deux mots de passe ne sont pas identiques";
    }
}
mysqli_close($cnx);
?>
echo "
<!DOCTYPE html>
<html>

<head>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='/bijouterie/css/ajout.css'>
</head>

<body>

    <div class='fr resp'>
        <div class='container w-50 bg-light m-auto py-3  shadow px-5 '>
            <form class='w-75 m-auto' method='post'>
                <h2 class='w-100 text-center text-secondary'>Ajouter un utilisateur</h2>
                <input type='text' class='form-control my-2' name='user' placeholder='Nom d utilisateur' required />
                <input type='email' class='form-control my-2' name='email' placeholder='Email' required />
                <input type='password' class='form-control my-2' name='pass' placeholder='Mot de passe' required />
                <input type='password' class='form-control my-2' name='passconf' placeholder='Confirmer mot de passe' required />
                
                <select id="lvl" class="form-select" name="niv">
                    <option value='Administrateur'>Adminnistrateur</option>
                    <option value='Utilisateur'>Utilisateur</option>
                </select>
                <div class='text-center my-2'><input type='submit' name='submit' name="inscrire" value='Ajouter' class='btn btn-secondary btn-lg' />
                    <?php
                    if (!empty($message)) {
                        echo "<p class='text-danger'>" . $message . "</p>";
                    }
                    if (!empty($message2)) {
                        echo "<p class='text-success h4'>" . $message2 . "</p>";
                        echo "<p>Cliquez ici pour vous <a href='logout.php'>connecter</a></p>";
                    }
                    if (!empty($message1)) {
                        echo "<p class='text-danger'>" . $message1 . "</p>";
                    }
                    if (!empty($message3)) {
                        echo "<p class='text-danger'>" . $message3 . "</p>";
                    }
                    if (!empty($message4)) {
                        echo "<p class='text-danger'>" . $message4 . "</p>";
                    }
                    ?>


                </div>
        </div>
        <div class="custom-shape-divider-bottom-1678302607">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M892.25 114.72L0 0 0 120 1200 120 1200 0 892.25 114.72z" class="shape-fill"></path>
            </svg>
        </div>

        </form>

</body>

</html>