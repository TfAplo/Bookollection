<?php 
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