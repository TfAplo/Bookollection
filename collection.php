<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_collection.css">
    <link rel="icon" href="images\ico.png" type="image/png">
    <title>MaCollection - Bookollection</title>
</head>
<body>
    <header>
        <nav>
            <img alt="Logo de MyBookollection" src="images/ico.png"> 
            <input class="nav_button" type="button" value="Ma collection">
            <input class="nav_button" type="button" value="Actualités">
            <input class="nav_button" type="button" value="Recherche">
        </nav>
        <h1>Bookollection</h1>
        <a href="" class="compte"><img alt="compte" src="images/compte.png" class="compte" id="img_compte"></a>
    </header>

    <div id="contenu">
        
        <div id="gauche">
            <form name="form" id="filtre">
                <h2>Filtres</h2>
                <label for="" id="genre">
                    Genre :
                    <select id="select_genre">
                        <option value="roman">Roman</option>
                        <option value="bd">Bande Dessinée</option>
                        <option value="poésie">Poésie</option>
                        <option value="autobiographie">Autobiographie</option>
                    </select>
                </label>
                <br>
                <br>
                <label for="" id="registre">
                    Registre :
                    <select id="select_registre">
                        <option value="fantastique">Fantastique</option>
                        <option value="policier">Policier</option>
                        <option value="comique">Comique</option>
                        <option value="pique">Epique</option>
                        <option value="tragique">Tragique</option>
                    </select>
                </label>
                <br>
                <br>
                <label for="" id="lu">
                    <input type="checkbox" name="lu" id="checkbox_lu">
                    Lu
                </label>
                <br>
                <br>
                <label for="" id="possession">
                    <input type="checkbox" name="possession" id="checkbox_possession">
                    Possession
                </label>
            </form>
        </div>
        
        <div id="droite">
            <input type="text" id="input_recherche" placeholder="Rechercher un livre, un auteur, ...">
        </div>

    </div>
</body>
</html>
