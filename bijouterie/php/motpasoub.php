<?php
session_start();
$cnx = mysqli_connect("localhost", "root", "", "bijouterie");

if(!empty($_POST))
{
    extract($_POST);
    $valide = true;

    if(isset($_POST['envoyer']))
    {
        $email = htmlentities(strtolower(trim($email))); 
        if(empty($email))
        {
            $valide = false;
            $er_mail="Il faut saisir un email";
        }
        if($valide)
        {
            $req1="SELECT * FROM utilisateur WHERE email='$email'" ;
            $res1 = mysqli_query($cnx, $req1) or die(mysqli_error($cnx));
            if (mysqli_num_rows($res1) == 0) {
                $message = "vérifier votre email";
            }
            else 
            {
                $l=mysqli_fetch_array($res1);
                $new_pass = rand();
                $objet = 'Nouveau mot de passe';
                $to = $email;

                $header = "From: NOM_DE_LA_PERSONNE <no-reply@test.com> \n";
                $header .= "Reply-To: ".$to."\n";
                $header .= "MIME-version: 1.0\n";
                $header .= "Content-type: text/html; charset=utf-8\n";
                $header .= "Content-Transfer-Encoding: 8bit";

                $contenu ="<html>".
                            "<body>".
                            "<p style='text-align: center; font-size: 18px'><b>Bonjour </b>,</p><br/>".
                            "<p style='text-align: justify'><i><b>Nouveau mot de passe : </b></i>".$new_pass."</p><br/>".
                            "</body>".
                            "</html>";

                        mail($to, $objet, $contenu, $header);
                        $req2="UPDATE utilisateur SET pass = '$new_pass' WHERE email = '$email'";
                        $res2 = mysqli_query($cnx, $req2) or die(mysqli_error($cnx));
                        
                        
            }
        }
    }

}


        /*$pass=uniqid();
        echo "$pass";
        $hashepass=password_hash($pass,PASSWORD_DEFAULT);
        $mess="voici votre nouveau mot de passe : $pass ";
        $headers='content-type: text/plain; charest="utf8"'." ";
    

        if(mail($email,'Mot de passe oublié',$mess,$headers))
            {
                $req="UPDATE utilisateur set pass='$hashepass' WHERE email='$email'";
                $res = mysqli_query($cnx, $req);
            if (mysqli_affected_rows($cnx) == -1)
                $message = "!!! Erreur ";
            else
                $message2 = "Mail envoyé avec succès.";*/
    



?>
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
                <h2 class='w-100 text-center text-secondary'>Mot de passe oublié</h2>
                <input type='text' class='form-control my-2' name='email' placeholder='Email' required />
                
                <div class='text-center my-2'><input type='submit' name="envoyer" value='Envoyer' class='btn btn-secondary btn-lg' />
                    


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
