<?php

    function connexion(){
        $link = mysqli_connect('localhost', 'root', '', 'Bookollection');

        if (!$link) {
            die("Erreur d'acces a la base");
        }
        return $link;
    }

?>