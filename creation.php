<?php
function createAccount($email, $username, $password){
    $link = connexion();
    if (checkDB($link, $username, 'nomUtilisateur')) {

        if (checkDB($link, $email, 'email') && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($link, "INSERT INTO utilisateur (nomUtilisateur, MotDePasse, email) VALUES ('$username', '$hashPassword', '$email')");
            createSession($link, $username);
            header('Location: collection.php');

        }
        else{
            echo 'Cette email est déja utilisé ou invalide';
        }
    }
    else{
        echo'nom d\'utilisateur déja utilisé';
    }
    if ($link) {mysqli_close($link);}
}

function connexion(){
		$link = mysqli_connect('localhost', 'root', '', 'Bookollection');
	
		if (!$link) {
			die("Erreur d'acces a la base");
		}
		return $link;
}

function checkDB($link, $value, $row){
    $result = mysqli_query($link, "SELECT $row FROM utilisateur WHERE $row='$value'");
	$bol = mysqli_num_rows($result) == 0;
	mysqli_free_result($result);
    return $bol;
}

function createSession($link, $username){
    $id = mysqli_query($link, "SELECT idUtilisateur FROM utilisateur WHERE nomUtilisateur='$username'");
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
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
            <input type="email" id="email" name="email" placeholder="Entrez votre email">
            </label>
            <label>Nom d'utilisateur
            <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur">
            </label>
            <label>Mot de passe
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
            </label>   
            
            <div id="basform">
                <input id="bouton-connecter" type="submit" value="S'inscrire">
                <a id="changeLog" href="connexion.php">Se connecter</a>
            </div>
            <p>
                    <?php 
                         if (isset($_POST['email']) && !empty($_POST['email'])
                         && isset($_POST['username']) && !empty($_POST['username'])
                         && isset($_POST['password']) && !empty($_POST['password'])) {
                         
                             createAccount($_POST['email'], $_POST['username'], $_POST['password']);
                        }
                    ?>
            </p>
        </form>
    </div>
    <script src="JSscripts/theme.js"></script>
</body>
</html>
