<?php


// Retourne la moyenne des notes d'un livre
function moyNotes($idLivre){
    $link = mysqli_connect('localhost','root','','bookollection',3306);
    if (!$link) {
        echo "Erreur: Impossible de se connecter à la base de données";
        exit;
    }
    $tab_notes = array();
    $req_notes = "SELECT note FROM ajoutcollection WHERE idLivre = $idLivre AND note IS NOT NULL";
    $result_notes = mysqli_query($link,$req_notes);
    $nb_notes = mysqli_num_rows($result_notes);
    if ($nb_notes == 0){
        return " - ";
    }else{
        while ($row_notes = mysqli_fetch_row($result_notes)){
            $tab_notes[] = $row_notes[0];
        }
        $moy = array_sum($tab_notes)/$nb_notes;
        return round($moy,2);
    }
    mysqli_free_result($result_notes);

}




?>