<?php
$cnx = mysqli_connect("localhost", "root", "", "bijouterie");
session_start();
if (isset($_POST['user'])) {
    $user = stripslashes($_REQUEST['user']);
    $user = mysqli_real_escape_string($cnx, $user);
    $pass = stripslashes($_REQUEST['pass']);
    $pass = mysqli_real_escape_string($cnx, $pass);
    $pass = hash('sha256', $pass);

    $req1 = "SELECT * FROM utilisateur 
            WHERE user='$user' 
            and pass='$pass'";

    $res1 = mysqli_query($cnx, $req1) or die(mysqli_error($cnx));

    if (mysqli_num_rows($res1) == 0) {
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    } else {
        $_SESSION['user'] = $user;
        header("Location: main.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>authentification</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/aut.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <header>
            <div class='titre'>
            <span>B</span>
            <span>i</span>
            <span>j</span>
            <span>o</span>
            <span>u</span>
            <span>t</span>
            <span>e</span>
            <span>r</span>
            <span>i</span>
            <span>e</span>
            &nbsp
            <span>B</span>
            <span>e</span>
            <span>n</span>
            &nbsp 
            <span>H</span>
            <span>l</span>
            <span>o</span>
            <span>u</span>
            <span>a</span>
        </div>
    <img src='../logo.png' id='logo'>
</header>

<div class='container-sm w-25 p-3 mt-5 border rounded shadow'>
<form method='POST' class='m-auto'>
<fieldset >
    <legend>Authentification</legend>
    <div class='form-group'>
    <label for='nom'>Utilisateur :</label>
    <input id='nom' type='text' class='form-control' name='user' placeholder='Nom d utilisateur' required>
    </div>
    <div class='form-group'>
    <label for='password'>Mot de passe :</label>
    <input type='password' id='password' class='form-control' name='pass' placeholder='Mot de passe' required>
    </div>

    
    
    <div class='text-center mt-2'><button class='btn btn-outline-primary ' type='submit'>Entrer</button></div>
<?php
if (!empty($message)) {
    echo "<p class='text-danger'>" . $message . "</p>";
}
?>
</fieldset>
</form>
</div>
<div class='custom-shape-divider-bottom-1678215897'>
    <svg data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'>
        <path d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' class='shape-fill'></path>
        <path d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' class='shape-fill'></path>
        <path d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' class='shape-fill'></path>
    </svg>
</div>
    
</body>
</html>