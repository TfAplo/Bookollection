<?php

// fonction qui affiche le nom du ou des registres d'un livre
function livreEstRegistre($idLivre){
    $link = mysqli_connect('localhost','root','','bookollection',3306);
    if (!$link) {
        echo "Erreur: Impossible de se connecter à la base de données";
        exit;
    }
    $result = "";
    $req_registre = "SELECT nomRegistre FROM registre INNER JOIN livreestregistre USING(idRegistre) WHERE livreestregistre.idLivre = $idLivre";
    if ($result_registre = mysqli_query($link,$req_registre)){
        $i = 0;
        while ($row_registre = mysqli_fetch_row($result_registre)){
            if ($i == 0){
                $result=$result. $row_registre[0];
            }else{
                $result=$result. ", ".$row_registre[0];
            }
            $i++;
        }
        mysqli_free_result($result_registre);
    }
    mysqli_close($link);
    return $result;
}



?>