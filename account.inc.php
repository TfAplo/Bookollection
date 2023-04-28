<?php
function createAccount($email, $username, $password){
    $link = connexion();
    if (checkDB($link, $username, 'nomUtilisateur')) {

        if (checkDB($link, $email, 'email') && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($link, "INSERT INTO utilisateur (nomUtilisateur, MotDePasse, email) VALUES ('$username', '$hashPassword', '$email')");
            $result = mysqli_query($link, "SELECT idUtilisateur FROM utilisateur WHERE nomUtilisateur='$username'");
            $id = mysqli_fetch_row($result)[0];
            createSession($username, $id);
            if ($link) {mysqli_close($link);}
            header('Location: collection.php');
            die();
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

function createSession($username, $id){
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
}

function checkAccount($username, $password){
    $link = connexion();
    $result = mysqli_query($link, "SELECT idUtilisateur, MotDePasse FROM utilisateur WHERE nomUtilisateur='$username'");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_row($result);
        $hpassword = $row[1];
        if (password_verify($password, $hpassword)){
            $id = $row[0];
            createSession($username, $id);
            if ($link) {mysqli_close($link);}
            header('Location: collection.php');
            die();
        }
    }
    echo 'identifiants invalides';
}

?>