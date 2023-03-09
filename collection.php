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


        <!-- Bouton popup -->
        <button id="myBtn"><img alt="compte" src="images/compte.png" id="img_compte"></button>

        <!-- popup -->
        <div id="myModal" class="modal">

            <!-- contenue popup -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Nom d'utilisateur: </p>
                <p>Mdp: **********</p>
            </div>

            <!-- categorie de bouton -->
            <div class="categories">
                <button class="category-button" data-category="profil">Profil</button>
                <button class="category-button" data-category="abonnement">Abonnement</button>
                <button class="category-button" data-category="securite">Sécurité</button>
                <button class="category-button" data-category="assistance">Assistance</button>
                <button class="category-button" data-category="a_propos">A Propos</button>
            </div>
        </div>

        <!-- visible/non-visible popup -->
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

        <!-- change de contenue de popup en fonction de la catégories choisie -->
        <script>
            const categoryButtons = document.querySelectorAll('button[data-category]');
            const popup = document.querySelector('#myModal .modal-content');

            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const category = button.dataset.category;

                    if (category === 'profil') {
                        popup.innerHTML = '<img alt="compte" id="img_popup" src="images/compte.png"><p>Nom d\'utilisateur: </p><p>Mdp: **********</p>';
                    } else if (category === 'abonnement') {
                        popup.innerHTML = '<p>Contenu pour la catégorie Abonnement</p>';
                    } else if (category === 'securite') {
                        popup.innerHTML = '<p>Contenu pour la catégorie Sécurité</p>';
                    } else if (category === 'assistance') {
                        popup.innerHTML = '<p>Contenu pour la catégorie Assistance</p>';
                    } else if (category === 'a_propos') {
                        popup.innerHTML = '<p>Contenu pour la catégorie A propos</p>';
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
