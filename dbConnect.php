<?php

	function dbConnect() {
		$link = mysqli_connect('localhost', 'root', 'root', 'bookollectiondb');
		if (!$link) {
			die('Erreur d\'accès à la base de données - FIN');
		} else {
			//echo 'Connexion réussie <br>';
		}
		return $link;
	}

?>
