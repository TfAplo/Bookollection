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
            <input class="nav_button" type="button" value="Ma collection">
            <input class="nav_button" type="button" value="Actualités">
            <input class="nav_button" type="button" value="Recherche">
        </nav>
        <h1>Bookollection</h1>


        <button id="myBtn"><img alt="compte" src="images/compte.png" id="img_compte"></button>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Nom d'utilisateur: </p>
                <p>Mdp: **********</p>
            </div>

        </div>

        <script>
            var modal = document.getElementById("myModal");
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0]; 
            btn.onclick = function() {
            modal.style.display = "block";
            }
            span.onclick = function() {
            modal.style.display = "none";
            }
            window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                }
            }
        </script>

    </header>

    <div id="contenu">
        
        <div id="gauche">
            <form name="form" id="filtre">
                    <label for="" id="genre">
                        Genre :
                        <select>
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
                        <select>
                            <option value="fantastique">Fantastique</option>
                            <option value="policier">Policier</option>
                            <option value="comique">Comique</option>
                            <option value="pique">Epique</option>
                            <option value="tragique">Tragique</option>
                        </select>
                    </label>
            </form>
        </div>
        
        <div id="droite">
            <input type="text" id="input_recherche" placeholder="Rechercher un livre, un auteur, ...">
        </div>

    </div>
</body>
</html>