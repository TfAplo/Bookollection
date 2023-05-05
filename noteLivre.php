<?php
// fonction qui affiche les notes d'un livre stylisé en étoiles

function noteStyle($note){
    
    $result = "";
    if ($note == 0){
        return " ";
    }else{
        $result1 = "☆";
        $result2 = "☆";
        $result3 = "☆";
        $result4 = "☆";
        $result5 = "☆";
    for ($i=0;$i<$note;$i++){
        if ($i == 0){
            $result1 = "★";
        }
        if ($i == 1){
            $result2 = "★";
        }
        if ($i == 2){
            $result3 = "★";
        }
        if ($i == 3){
            $result4 = "★";
        }
        if ($i == 4){
            $result5 = "★";
        }
    }
    $result = $result1.$result2.$result3.$result4.$result5;
}
   
    return $result;

}


?>