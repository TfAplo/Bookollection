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

        <!-- Pop up -->
        <div id="myModal" class="modal">

            <!-- Contenue pop up -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Nom d'utilisateur: </p> <!--Récuperer le nom dut et mdp et faire un oeil pour l'afficher -->
                <p>Mdp: **********</p>
            </div>

            <!-- Bouton en bas de pop up-->
            <div class="categories">
                <button class="category-button" data-category="profil">Profil</button>
                <button class="category-button" data-category="abonnement">Abonnement</button>
                <button class="category-button" data-category="securite">Sécurité</button>
                <button class="category-button" data-category="assistance">Assistance</button>
                <button class="category-button" data-category="a_propos">A Propos</button>
            </div>
        </div>

        <!-- categories: Profil/Abonnement/Sécurité/Assistance/A propos -->
        <!-- Profil:   nom dut, mdp, photo de profil, thème (blanc/noir),  -->
        <!-- Abonnement: plusieurs abonnement vite fait-->
        <!-- Sécurité:  changer mdp, mail, -->
        <!-- Assistance: numero de tel, chatbot (pas fonctionel flemme) -->
        <!-- A propos: credit des createur et puis jsp  -->

        <!-- Afficher/enlever la pop up -->
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

        <!-- Changer de page pop up -->
        <script>
            const categoryButtons = document.querySelectorAll('.category-button');
            const popupContent = document.querySelector('#popup');

            categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.dataset.category;
                // Mettez à jour le contenu de la pop-up en fonction de la catégorie sélectionnée
            if (category === 'profil') {
                popupContent.innerHTML = '<h2>profil</h2><p>Contenu pour la catégorie 1</p>';

            } else if (category === 'abonnement') {
                popupContent.innerHTML = '<h2>abonnement</h2><p>Contenu pour laie 2</p>';

            } else if (category === 'securite') {
                popupContent.innerHTML = '<h2>securite</h2><p>Contenu pour la orie 3</p>';
            }
            });
            });
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
