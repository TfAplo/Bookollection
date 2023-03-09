<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/actu.css">
    <title>Actualités</title>
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
    <h2>Top des livres *</h2>
        <p>*Calculé en fonction des notes recensées</p>
    <div class="top">
        
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Angelique</h3>
            <p>par Guillaume Mussot - paru en Septembre 2022</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Vivre vite</h3>
            <p>par Brigitte Giraud - paru en août 2022</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Le Monde Sans Fin</h3>
            <p>par Jancovici et Blain - paru en Octobre 2021</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Antigone</h3>
            <p>par Jean Anouilh - paru en Juin 2016</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Solo Leveling</h3>
            <p>par H-goon Chugong - paru en mars 2023</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
    </div>
    <h2>Les nouvelles sorties</h2>
    <div class="top">
         <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">  
            <h3>Solo Leveling</h3>
            <p>par H-goon Chugong - paru en mars 2023</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Angelique</h3>
            <p>par Guillaume Mussot - paru en Septembre 2022</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Vivre vite</h3>
            <p>par Brigitte Giraud - paru en août 2022</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Le Monde Sans Fin</h3>
            <p>par Jancovici et Blain - paru en Octobre 2021</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Antigone</h3>
            <p>par Jean Anouilh - paru en Juin 2016</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton">Voir plus</a>
        </div>

    </div>
        
    <div class="box_fest">
        <div class="text_fest">
            <h4>Différents évenement pour les passionner de lecture !</h4>
            <br>
            <p>Partagez vos lectures du moment, avec les différents évenement autour des livres !
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
            <a href="event.php" class="bouton bouton_fest">Voir plus</a>
        </div>
        <img class="affiche_fest" src="images/affiche_fest_2.png" alt="actu">
    </div>


    <footer>
        <form action="fic.php" method="post">
        <div class="topo_newsletter">
            <h3 class="text-news">S'inscrire à la newsletter</h3>
            <div class="newsletter">
                <input type="email" id="email" name="email" placeholder="Votre email">
                <input class="" type="submit" value="S'inscrire">
            </div>
        </div>
        <p>Bookollection - 2023</p>
    </footer>
    <script src="JSscripts/theme.js"></script>
</body>
</html>