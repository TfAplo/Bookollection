<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_collection.css">
    <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
    <title>MaCollection - Bookollection</title>
</head>
<body>
    <header>
        <nav>
            <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
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
                    Genre :<br>
                    <label class="label_genre"><input type="checkbox" class="input_genre" name="genre[]" value="roman"> Roman</label><br>
                    <label class="label_genre"><input type="checkbox" class="input_genre" name="genre[]" value="bd"> Bande Dessinée</label><br>
                    <label class="label_genre"><input type="checkbox" class="input_genre" name="genre[]" value="poésie"> Poésie</label><br>
                    <label class="label_genre"><input type="checkbox" class="input_genre" name="genre[]"  value="autobiographie"> Autobiographie</label>
                </label>
                <br>
                <br>
                <label for="" id="registre">
                    Registre :<br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]" value="fantastique"> Fantastique</label><br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]" value="policier"> Policier</label><br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]" value="comique"> Comique</label><br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]"  value="epique"> Epique</label><br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]"  value="tragique"> Tragique</label><br>
                </label>
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
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
            <span class="livre">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam tempore id suscipit illo voluptatibus inventore officiis quisquam laudantium officia distinctio quibusdam rerum, obcaecati necessitatibus quia accusantium. Exercitationem, aut incidunt</span>
        </div>

    </div>
</body>
</html>
