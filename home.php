<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_home.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Bookollection</h1>
        <div id="bouton_header">
            <button type="button" id="bouton">Ma collection</button>
            <button type="button" id="bouton">Actualités</button>
            <button type="button" id="bouton">Recherche</button>
        </div>
    </header>

    <?php
        // recupere les informations entrées dans le formulaire
        $name = $_POST["username"];
        $password = $_POST["password"];
        
        echo "<p>welcome $name let's get started</p>"
    ?>
</body>
</html>