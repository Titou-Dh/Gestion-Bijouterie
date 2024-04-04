<?php
include 'connexion.php';
include_once('nav.php');
if (isset($_REQUEST['pass'], $_REQUEST['passconf'])) 
{
  $pass = stripslashes($_REQUEST['pass']);
  $pass = mysqli_real_escape_string($cnx, $pass);
  $passconf = stripslashes($_REQUEST['passconf']);
  $passconf = mysqli_real_escape_string($cnx, $passconf);
  if ($pass == $passconf) 
  {
    $pass = hash('sha256', $pass);
    if (isset($_REQUEST['user']))
    {
      $user=$_GET['user'];
      if(!empty($user))
      {
        $req1 = "UPDATE utilisateur set pass='$pass'where user='$user'";
        $res1 = mysqli_query($cnx, $req1) or die(mysqli_error($cnx));
        if (mysqli_affected_rows($cnx) == -1)
          $message = "!!! modification echouée";
        else
          $message2 = "La modification de mot de passe a été prise en compte ! Déconnectez-vous et reconnectez-vous afin de valider ce changement.";
      }
    } 
  }
  else
    $message3 = "!!! Les deux mots de passe ne sont pas identiques";

  }
  mysqli_close($cnx);
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../css/ajout.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'
    integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN'
    crossorigin='anonymous'></script>
</head>

<body>
  <div class='fr resp'>
    <div class='container w-50 bg-light  py-3  shadow px-5'>
      <h3 class='w-100 text-center text-secondary'>Modifier le mot de passe</h3>
      <form class='' method='post' class=" w-50 m-auto">
        <div class="form-group my-2">
          <input type='password' class='form-control' name='pass' id='pass' placeholder='Mot de passe' required />
        </div>
        <div class="form-group">
          <input type='password' class='form-control' name='passconf' placeholder='Confirmer mot de passe' required />
        </div>
        <div class='w-100 my-3 text-center'><button type="submit" name="submit" class="btn btn-secondary">Modifier</button></div>
        <?php
        if (!empty($message)) {
          echo "<p class='text-danger'>" . $message . "</p>";
        }
        if (!empty($message2)) {
          echo "<p class='errorMessage'>" . $message2 . "</p>";
          echo "<p>Cliquez ici pour vous <a href='logout.php'>connecter</a></p>";
        }
        if (!empty($message3)) {
          echo "<p class='text-danger'>" . $message3 . "</p>";
        }


        echo "

    
</form>
    </div>
    </div>
</body>
</html>";
?>