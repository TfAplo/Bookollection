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
            var categorie = document.getElementById("categories");
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
            const initialModalContent = modalContent.innerHTML;

            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const category = button.dataset.category;
                    const modalContent = document.querySelector('.modal-content'); // déplacer la variable modalContent ici

                    if (category === 'profil') {
                        modalContent.innerHTML = modalContent;
                    } else if (category === 'abonnement') {
                        modalContent.innerHTML = '<h2>Abonnement</h2><p>Contenu pour la catégorie Abonnement</p>';
                    } else if (category === 'securite') {
                        modalContent.innerHTML = '<h2>Sécurité</h2><p>Contenu pour la catégorie Sécurité</p>';
                    } else if (category === 'assistance') {
                        modalContent.innerHTML = '<h2>Assistance</h2><p>Contenu pour la catégorie Assistance</p>';
                    } else if (category === 'a_propos') {
                        modalContent.innerHTML = '<h2>A propos</h2><p>Contenu pour la catégorie A propos</p>';
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
