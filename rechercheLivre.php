<?php
    if (isset($_POST["input_recherche"])) {
        $titre = $_POST["input_recherche"];

        $requete = "SELECT * FROM livre WHERE titre LIKE $titre"
        $db = new mysqli(srv, usr, pwd, db, port);
        $res = $db->query($requete);
        //deconnection
        while ($row = mysqli_fetch_assoc($result)) {
            $titreLivre = $result["titre"];
            $descriptionLivre = $result["description"];

            <a class="livres" href="livre.html">
                <img src="images/book-cover-picture.png" width="60px" alt="couverture du livre">
                <div>
                    <h3>Titre du livre</h3>
                    <p> ipsum dolor sit amet consectetur adipisicing elit. Distinctio, nulla, neque autem ipsam error ullam eveniet asperiores quos repellat assumenda pariatur ipsa!</p>
                </div>
            </a>
        }
    }
    $searchText = $_GET['q'];
    // Connexion à la base de données
    $conn = mysqli_connect('localhost', 'user', 'password', 'database');
    // Échapper les caractères spéciaux pour éviter les injections SQL
    $searchText = mysqli_real_escape_string($conn, $searchText);
    // Requête SQL pour chercher dans la table 'my_table'
    $query = "SELECT * FROM my_table WHERE column LIKE '%$searchText%'";
    $result = mysqli_query($conn, $query);
    // Traiter les résultats de la requête
    while ($row = mysqli_fetch_assoc($result)) {
        // Do something with the row
    }
?>
