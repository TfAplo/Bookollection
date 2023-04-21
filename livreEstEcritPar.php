<?php
// fonction qui affiche le nom du ou des auteurs d'un livre
function livreEstEcritPar($idLivre){
    $link = mysqli_connect('localhost','root','','bookollection',3306);
    if (!$link) {
        echo "Erreur: Impossible de se connecter à la base de données";
        exit;
    }
    $result = "";
    $req_auteur = "SELECT prenomAuteur,nomAuteur FROM auteur, ecritpar WHERE auteur.idAuteur = ecritpar.idAuteur AND ecritpar.idLivre = $idLivre";
    if ($result_auteur = mysqli_query($link,$req_auteur)){
        $i = 0;
        while ($row_auteur = mysqli_fetch_row($result_auteur)){
            if ($i == 0){
                $result=$result. $row_auteur[0]." ".$row_auteur[1];
            }else{
                $result=$result. ", ".$row_auteur[0]." ".$row_auteur[1];
            }
            $i++;
        }
        mysqli_free_result($result_auteur);
    }
    mysqli_close($link);
    return $result;
}






?>