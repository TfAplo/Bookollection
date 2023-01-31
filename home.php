<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_home.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Bookollection</h1>
        <div id="bouton_header">
            <button>Ma collection</button>
            <button>Actualités</button>
            <button>Recherche</button>
        </div>
    </header>

    <?php
        // recupere les informations entrées dans le formulaire
        $name = $_POST["username"];
        $password = $_POST["password"];
        
        echo "welcome $name let's get started"
    ?>
</body>
</html>