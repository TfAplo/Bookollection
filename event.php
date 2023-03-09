<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/actu.css">
    <title>Evènement</title>
</head>
<body>
        
<header>
        <nav>
            <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
            <input class="nav_button" type="button" onclick="window.location.href = 'collection.html';" value="Ma collection">
            <input class="nav_button" type="button" onclick="window.location.href = 'actu.php';" value="Actualités">
            <input class="nav_button" type="button" onclick="window.location.href = 'recherche.html';" value="Recherche">
        </nav>
        <h1>Bookollection</h1>
        <a href="" class="compte"><img alt="compte" src="images/compte.png" class="compte" id="img_compte"></a>
    </header>
    <div class="theme">
        <a class="clair" href="javascript:void(0)"><img src="images/wb_sunny.png" alt="" width="20px"></a>
        <a class="sombre" href="javascript:void(0)"><img src="images/brightness_2.png" alt="" width="20px"></a>
    </div>
        
    <div class="grid_event">
        
        <div class="box_event">
            <img  class="img_event" src="images/blois_bdoum_2022.jpg" alt="Affiche bd boom 2022">
            <div class="text_event">
                <h3>BD Boum</h3>
                <br>
                <p>Date début : 18/11/2022 - Date de fin : 20/11/2022</p>
                <br>
                <p>Premier festival gratuit de bande dessinée en France, il est l'un des plus importants sur le plan de la fréquention avec près de 23000 visiteurs.
                    Il se déroule chaque année fin novembre pendant trois jours à Blois (41000). </p>
                <br>
                <a href="https://www.blois.fr/attractive/festive/bd-boum" class="bouton">Voir plus</a>
            </div>
        </div>
        <div class="box_event">
            <img class="img_event" src="images/festival_angouleme_2023.jpg" alt="affiche du festival d'angouleme">
            <div class="text_event">
                <h3>Festival d'Angouleme</h3>
                <br>
                <p>Date début : 26/01/2023 - Date de fin : 29/01/2023</p>
                <br>
                <p>Principal festival de bande dessinée francophone et le plus réputé et fréquenté dans le monde. Il se déroule chaque année en janvier à Angoulême (16000).</p>
                <br>
                <a href="https://www.bdangouleme.com/" class="bouton">Voir plus</a>
            </div>
        </div>
        <div class="box_event">
            <img class="img_event" src="images/nuits_de_la_lecture.jpg" alt="Affiche de la nuit de la lecture">
            <div class="text_event">
                <h3>Les nuits de la lecture</h3>
                <br>
                <p>Date début : 19/01/2023 - Date de fin : 22/01/2023</p>
                <br>
                <p>Créées en 2017 par le ministère de la Culture, "La nuit de la lecture" est un évènement culturel qui met en lumière la lecture sous toutes ses formes.
                    Les bibliothèques, médiathèques et librairies ouvrent leurs portes sur des horaires étendus en proposanr des animations attractives autour de la lecture.</p>
                <br>
                <a href="https://www.nuitsdelalecture.fr/" class="bouton">Voir plus</a>
            </div>
        </div>
        <div class="box_event">
            <img class="img_event" src="images/festival_livre_paris.jpg" alt="affiche du festival de livre de Paris">
            <div class="text_event">
                <h3>Festival du livre de Paris</h3>
                <br>
                <p>Date début : 21/04/2023 - Date de fin : 23/04/2023</p>
                <br>
                <p>Principal festival de bande dessinée francophone et le plus réputé et fréquenté dans le monde. Il se déroule chaque année en janvier à Angoulême (16000).</p>
                <br>
                <a href="https://www.festivaldulivredeparis.fr/" class="bouton">Voir plus</a>
            </div>
        </div>
    </div>
    <script src="JSscripts/theme.js"></script>
</body>
</html>