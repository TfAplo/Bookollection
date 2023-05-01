
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/livrephp.css">
        <link rel="stylesheet" href="styles/popup.css">
        <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
        <title>Page d'un livre - Bookollection</title>
    </head>
    <body>


        <header>
            <nav>
                <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
                <input class="nav_button" type="button" onclick="window.location.href = 'collection.html';" value="Ma collection">
            <input class="nav_button" type="button" onclick="window.location.href = 'actualites.php';" value="Actualités">
            <input class="nav_button" type="button" onclick="window.location.href = 'recherche.html';" value="Recherche">
            </nav>
            <h1>Bookollection</h1>
                    <!-- Bouton popup -->
        <button id="bouton_compte"><img alt="compte" src="images/account_circle_clair-removebg-preview.png" id="img_compte"></button>

        <!-- popup -->
        <div id="myModal" class="modal">

            <!-- contenue popup -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <img alt="compte" id="img_popup" src="images/account_circle_clair-removebg-preview.png">
                <p>Nom d'utilisateur: Sebastien Bernard </p>
                <p>Mot de passe: *****************</p>
                <p>Email: sebastien.bernard@gmail.com</p>
                <p>Date de naissance: 19/06/1975</p>
                <button id="deconnecter" onclick="location.replace('connexion.html')">Se déconnecter</button>
           </div>

            <!-- categorie de bouton -->
            <div class="categories">
                <button class="category-button" data-category="profil">Profil</button>
                <button class="category-button" data-category="securite">Sécurité</button>
                <button class="category-button" data-category="soutenir">Soutenir</button>
                <button class="category-button" data-category="assistance">Assistance</button>
                <button class="category-button" data-category="a_propos">A Propos</button>
            </div>
        </div>
        </header>

<?php
    require('date.php');
    require('moyNotes.php');
    require('livreEstEcritPar.php');
    require('livreEstRegistre.php');
    require('noteLivre.php');
    require('formatComment.php');
    require('account.inc.php');
    
    $link = connexion();
    if (!isset($_SESSION['id'])){
        session_start();
    }

    $user = $_SESSION['id'];

    if (isset($_GET['idLivre'])){
        $idLivre = $_GET['idLivre'];
    }
    

    // affichage global du livre et des informations
    $req_livre = "SELECT titre,description,couverture,dateParution,nomRegistre,nomGenre FROM livre INNER JOIN livreestregistre USING(idLivre) INNER JOIN registre ON registre.idRegistre = livreestregistre.idregistre INNER JOIN genre USING(idGenre) WHERE idLivre = {$idLivre}";
    if ($result_livre = mysqli_query($link,$req_livre)){
        $row = mysqli_fetch_row($result_livre);
        echo "<h1 id='titre'>".$row[0]."</h1>";
        echo "<div class='grid'>";
        echo "<div>";
        echo "<img id='imageLivre' src='images/livres/".$row[2]."'>";
        echo "</div>";
        echo "<div class='desc'>";
        echo "<h2 id='Tdescription'>Description :</h2>";
        echo "<p id='description'>".$row[1]."</p>";
        echo "</div>";
        echo "<div class='achat'>";
        echo "<h2 id='Tachat'>Acheter ce livre :</h2>";
        $req_site = "SELECT urlSite,logo FROM sitecommercial INNER JOIN enventesur USING(idSite) INNER JOIN livre USING(idLivre) WHERE idLivre = {$idLivre}";
        if ($result_site = mysqli_query($link,$req_site)){
            while ($row_site = mysqli_fetch_row($result_site)){
                echo "<p><a id='buyLink' href='".$row_site[0]."' target='__BLANK'><img id='logoSite' src='".$row_site[1]."'></a></p>";
            }

        }
        echo "</div>";
        echo "</div>";

        // formulaire des notes

        echo "<div class='rating'>";
        echo "<form action='livre.php?idLivre=".$idLivre."' method='post'>";
        echo "<button type='submit' name='note[]' value='5' class='testRating'"; 
        $reqNote5 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 5";
        $resNote5 = mysqli_query($link,$reqNote5);
        $rowsNote5 = mysqli_num_rows($resNote5);
        if ($rowsNote5 == 1){
            echo 'style ="color:orange";';
        }else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=5){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "<button type='submit' name='note[]' value='4' class='testRating'";
        $reqNote4 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 4";
        $resNote4 = mysqli_query($link,$reqNote4);
        $rowsNote4 = mysqli_num_rows($resNote4);
        if ($rowsNote4 == 1){
            echo 'style ="color:orange";';
        }else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=4){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "<button type='submit' name='note[]' value='3' class='testRating'";
        $reqNote3 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 3";
        $resNote3 = mysqli_query($link,$reqNote3);
        $rowsNote3 = mysqli_num_rows($resNote3);
        if ($rowsNote3 == 1){
            echo 'style ="color:orange";';
        }else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=3){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "<button type='submit' name='note[]' value='2' class='testRating'";
        $reqNote2 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 2";
        $resNote2 = mysqli_query($link,$reqNote2);
        $rowsNote2 = mysqli_num_rows($resNote2);
        if ($rowsNote2 == 1){
            echo 'style ="color:orange";';
        }else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=2){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "<button type='submit' name='note[]' value='1' class='testRating'";
        $reqNote1 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 1";
        $resNote1 = mysqli_query($link,$reqNote1);
        $rowsNote1 = mysqli_num_rows($resNote1);
        if ($rowsNote1 == 1){
            echo 'style ="color:orange";';
        }
        else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=1){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "</form>";
        echo "</div>";

        // affichage des informations
        echo "<div class='info'>";
        echo "<h2 id='Tinfo'>Informations :</h2>";
        echo "<p id='info'>Date de parution : ".dateFormat($row[3])."</p>";
        echo "<p id='info'>Genre : ".$row[5]."</p>";
        echo "<p id='info'>Registre : ".livreEstRegistre($idLivre)."</p>";
        echo "<p id='info'>Auteur(s) : ".livreEstEcritPar($idLivre)."";
        echo "</div>";
        
        mysqli_free_result($result_livre);
    }
    else {
        echo "Erreur: Impossible d'executer la requete $req_livre. " . mysqli_error($link);
        exit;
    }
    //formulaire pour ajouter le livre à la collection (lu et possédé)
    echo '
    <form method="post" action="livre.php?idLivre='.$idLivre.'">
    <div class="bookre">
    <label id="BookRead">

        <input class="box" type="checkbox" name="bookread" ';
        $reqRead = "SELECT * FROM ajoutcollection WHERE idLivre = {$idLivre} AND idUtilisateur = {$user} AND lu = 1";
        $resRead = mysqli_query($link,$reqRead);
        $rowsRead = mysqli_num_rows($resRead);
        if ($rowsRead == 1 || isset($_POST['bookread'])){
            echo 'checked="checked"';
        }
        echo ' onchange="submit();"">
        Livre lu
    </label>';

  echo '  <br>
    <label id="BookHave">
        <input class="box" type="checkbox" name = "bookhave" ';
        $reqHave = "SELECT * FROM ajoutcollection WHERE idLivre = {$idLivre} AND idUtilisateur = {$user} AND possede = 1";
        $resHave = mysqli_query($link,$reqHave);
        $rowsHave = mysqli_num_rows($resHave);
        if ($rowsHave == 1 || isset($_POST['bookhave'])){
            echo 'checked="checked"';
        }
        echo 'onchange="submit();"">
        Livre possédé
    </label>
</div>
</form>';

    //ajout des notes en bd

if (isset($_POST['note'])){
    $note = $_POST['note'];
    $reqNote = "SELECT * FROM ajoutcollection WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
    $resNote = mysqli_query($link,$reqNote);
    $rowsNote = mysqli_num_rows($resNote);
    if ($rowsNote == 0){
        $addNote = "INSERT INTO ajoutcollection (idLivre,idUtilisateur,note) VALUES ($idLivre,$user,$note[0])";
        $resNote= mysqli_query($link,$addNote);
    }
    else {
        $updateNote = "UPDATE ajoutcollection SET note = $note[0] WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
        $resNote= mysqli_query($link,$updateNote);
    }

}

// affichage des commentaires
$req_comments = "SELECT avis,note,nomUtilisateur FROM ajoutcollection INNER JOIN utilisateur USING(idUtilisateur) WHERE idLivre = {$idLivre} AND avis IS NOT NULL";
if ($result_comments = mysqli_query($link,$req_comments)){
    
    echo 
    "<div class='grid_comment'>
        <div class='box_comment'>
            <h2>Commentaires (".moyNotes($idLivre)."/5)</h2>
            ";
            echo "
            <h3>Ajouter un commentaire</h3>
            <form method='post' action='livre.php?idLivre={$idLivre}'>
                <textarea name='comment' placeholder='Votre commentaire...'></textarea>
                <br>
                <input type='submit' name='submit' value='Ajouter'>
                
            </form>
            ";
            if (isset($_POST['comment'])){
                $reqComment = "SELECT note,nomUtilisateur FROM ajoutcollection INNER JOIN utilisateur USING(idUtilisateur) WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
                $resComment = mysqli_query($link,$reqComment);
                $rowComment = mysqli_fetch_row($resComment);
                echo  "
                <div class='comment'>
                <p>".$rowComment[1]." - <span class='noteStar'>".noteStyle($rowComment[0])."</span></p>
                <p class='avisUser'>".$_POST['comment']."</p>
                </div>";
            }else{
        while ($row_comments = mysqli_fetch_row($result_comments)){
            
            echo "
            <div class='comment'>
                <p>".$row_comments[2]." - <span class='noteStar'>".noteStyle($row_comments[1])."</span></p>
                <p class='avisUser'>".$row_comments[0]."</p>
                
            </div>";
        }
    }
        echo "</div>
        <div>
        </div>
        </div>";
}
// ajouter un commentaire

    if (isset($_POST['comment'])){
        $comment = $_POST['comment'];
        $reqComment = "SELECT * FROM ajoutcollection WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
        $resComment = mysqli_query($link,$reqComment);
        $rowsComment = mysqli_num_rows($resComment);
        if ($rowsComment == 0){
            $addComment = "INSERT INTO ajoutcollection (idLivre,idUtilisateur,avis) VALUES ($idLivre,$user,'".formatComment($comment)."')";
            $resComment= mysqli_query($link,$addComment);
        }
        else {
            $updateComment = "UPDATE ajoutcollection SET avis = '".formatComment($comment)."' WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
            $resComment= mysqli_query($link,$updateComment);
        }
    }
        
// ajout collection lu et possédé

if (isset($_POST['bookread'])){
    $lu = 1;
}else{
    $lu = 0;
}
if (isset($_POST['bookhave'])){
    $possede = 1;
}else{
    $possede = 0;
}

$reqCollec = "SELECT * FROM ajoutcollection WHERE idUtilisateur = {$user} AND idLivre = {$idLivre}";
$resCollec = mysqli_query($link,$reqCollec);
$rowsCollec = mysqli_num_rows($resCollec);
if ($rowsCollec==0){
    $addCollec = "INSERT INTO ajoutcollection (idUtilisateur,idLivre,lu,possede) VALUES ({$user},{$idLivre},{$lu},{$possede})";
    $resAddCollec = mysqli_query($link,$addCollec);
}
else{
    $addCollec = "UPDATE ajoutcollection SET lu = {$lu}, possede = {$possede} WHERE idUtilisateur = {$user} AND idLivre = {$idLivre}";
    $resAddCollec = mysqli_query($link,$addCollec);
}

   
?>
        <script src="JSscripts/popup.js"></script>
        <script src="JSscripts/theme.js"></script>
    </body>
</html>
