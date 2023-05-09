<?php
function dateFormat($dateV){
    if ($dateV == NULL) {
        return NULL;
    }
    $dateV = new DateTime($dateV);
    $date = $dateV->format('d/m/Y');
    return $date;

}

?>