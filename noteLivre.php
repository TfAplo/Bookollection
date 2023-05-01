<?php
// fonction qui affiche les notes d'un livre stylisé en étoiles

function noteStyle($note){
    
    $result = "";
    if ($note == 0){
        return " ";
    }
    for ($i=0;$i<$note;$i++){
        $result = $result."☆";
    }
   
    return $result;

}


?>