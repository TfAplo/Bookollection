<?php
function dateFormat($dateV){
    $dateV = new DateTime($dateV);
    $date = $dateV->format('d/m/Y');
    return $date;

}




?>