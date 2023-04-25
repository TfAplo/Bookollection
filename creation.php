<?php 
require_once 'fun.php';

$email= '';
$username= '';
$password= '';
$post = false;

    if (isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['password']) && !empty($_POST['password'])) {
                            
        $email= $_POST['email'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $post = true;
    }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/connexion.css">
    <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
    <title>Accueil - Bookollection</title>
</head>
<body>
    <div id="left">
        <div class="filter">
            <div class="hautg">
                <h1 id="titre">Bookollection</h1>
                <h3>La manière la plus simple de se souvenir de vos lectures.</h3>
            </div>
            <div class="basg">
                <div class="card">
                    <h1 class="bienvenue">Bienvenue</h1>
                    <p class="para">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero natus deserunt minima voluptates beatae, possimus laboriosam? Corrupti, amet? Sed perferendis id consequuntur cupiditate ratione recusandae, voluptas quia fugiat repellat commodi!</p>
                </div>
            </div>
        </div>
    </div> 

    <div id="right">
        <div class="theme">
            <a class="clair" href="javascript:void(0)"><img src="images/wb_sunny.png" alt="" width="20px"></a>
            <a class="sombre" href="javascript:void(0)"><img src="images/brightness_2.png" alt="" width="20px"></a>
        </div>
        <form class="anime" action="creation.php" method="post">
            <h1 id="titrelog">Créer un compte</h1>
            
            <label>Email
            <input type="email" id="email" name="email" placeholder="Entrez votre email" value="<?php echo $email ?>">
            </label>

            <label>Nom d'utilisateur
            <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" value="<?php echo $username ?>">
            </label>
            
            <label>Mot de passe
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" value="<?php echo $password ?>">
            </label>   
            
            <div id="basform">
                <input id="bouton-connecter" type="submit" value="S'inscrire">
                <a id="changeLog" href="connexion.php">Se connecter</a>
            </div>
            <p>
                <?php 
                    if ($post) {createAccount($email, $username, $password);}
                ?>
            </p>
        </form>
    </div>
    <script src="JSscripts/theme.js"></script>
</body>
</html>
