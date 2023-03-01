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
            <span class="livre">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est in assumenda illum velit aliquam vel, expedita, voluptate delectus necessitatibus vero minima deleniti cum corporis, nostrum inventore asperiores enim laboriosam natus?</span><span class="livre">Cum soluta possimus velit at deserunt doloremque fuga quo fugit omnis. Quod id quas officiis iusto eveniet eaque assumenda repudiandae, deserunt voluptatem cupiditate. Dolorem laboriosam eius molestiae dicta. Quae, ullam?</span><span class="livre">Optio rerum rem dolorem reiciendis consectetur quia sit libero inventore iusto quis qui sunt beatae incidunt, voluptates, necessitatibus tempora et deserunt deleniti quos veritatis, numquam dolore? Fuga nobis optio delectus.</span><span class="livre">Debitis architecto quia a quasi dolorem sunt est, mollitia perferendis quis soluta illum consequatur quaerat. Harum, nemo minima. Saepe quod ab molestias repellendus natus assumenda deleniti tempora earum, voluptatem ea?</span><span class="livre">Sed tenetur ex, esse doloribus perferendis dolores eveniet necessitatibus maxime cupiditate illum dolore, dolorum odio quos dignissimos autem sapiente consequuntur nulla facere obcaecati minus reprehenderit eum corporis pariatur enim! Rem?</span><span class="livre">Harum doloribus rerum consequuntur explicabo accusantium inventore ipsam dolores suscipit ad? Optio molestiae non exercitationem ipsam modi esse necessitatibus est? Incidunt animi minima ipsam fuga inventore praesentium ab? Accusamus, consequuntur!</span><span class="livre">A eaque exercitationem, reprehenderit reiciendis ipsum distinctio hic quod? Repellat, impedit. Saepe commodi ullam eveniet at explicabo impedit quaerat ducimus aspernatur distinctio maiores, itaque, assumenda quod facilis iste possimus id.</span><span class="livre">Consequuntur quod, velit quidem tempore odio eligendi fugiat a recusandae rem, non, dolorem sed dolore maxime pariatur consectetur atque beatae tempora sapiente? Quae recusandae temporibus eaque ipsum minus possimus sed?</span><span class="livre">Maxime magni aliquid aliquam eligendi sapiente dolore placeat pariatur ab, harum nam veniam autem ducimus blanditiis voluptatem, assumenda a temporibus numquam voluptas dolorem hic? Dolorum facilis nihil soluta omnis eaque!</span><span class="livre">Quia fuga quasi enim officia deleniti, itaque cum alias cumque quo perspiciatis nisi aspernatur adipisci, illum, porro ab! Eveniet porro esse incidunt quo autem adipisci quasi id libero tempore commodi?</span><span class="livre">Rem, ullam at soluta fuga ratione eius voluptatum voluptatem sed excepturi culpa veritatis laboriosam, consequatur, quidem rerum sequi! Culpa saepe libero impedit labore possimus? Corrupti praesentium quae neque molestias quos.</span><span class="livre">At qui quos eveniet libero laudantium incidunt dolorem dicta dolor quisquam asperiores cupiditate excepturi provident omnis accusamus, eligendi odio. Accusamus, ex mollitia quod et odit voluptatum deserunt magni laudantium iure!</span><span class="livre">Iusto, magnam. Voluptates ut similique vitae amet eius veritatis porro earum natus dolores tempore quasi voluptas iste maiores fugit dolorem tenetur asperiores reiciendis ex saepe, maxime ipsum nemo? Quasi, repellendus?</span><span class="livre">Quia non fugiat quo earum ipsum impedit quos soluta fugit odio, necessitatibus ipsa praesentium aspernatur veritatis labore, eos tempora a dignissimos totam. Ex unde cum omnis modi ipsa labore necessitatibus.</span><span class="livre">Sequi, corrupti quas. Eligendi voluptatibus consequuntur illum reiciendis accusamus aut quos beatae dolore mollitia odit minima hic, temporibus officiis inventore amet consectetur autem cumque dicta. Laborum delectus hic veritatis corrupti!</span><span class="livre">Esse in facere adipisci ducimus impedit est quis, ea asperiores eveniet consectetur veritatis veniam quibusdam. Nulla explicabo dolores nam iste veniam dignissimos laboriosam culpa molestiae eum, placeat, consectetur, consequatur minus.</span><span class="livre">Doloremque quasi nesciunt dignissimos fugit illo. Saepe quidem vero officiis, aperiam est corporis corrupti? Dicta impedit tempora placeat, minima commodi facilis possimus? Officia ipsa eveniet commodi odio sit a ducimus.</span><span class="livre">Consequuntur autem expedita sequi asperiores aperiam voluptas adipisci, architecto dicta atque quisquam recusandae est rem tempora quibusdam culpa nesciunt harum eius tenetur facilis sint molestiae iste dolore! Amet, veritatis repellat?</span><span class="livre">Repellendus iste, voluptatibus cupiditate at odio asperiores officia repudiandae et exercitationem, dolore ipsam dolorem cum itaque obcaecati facere reiciendis quo dicta porro mollitia. Assumenda sequi est reiciendis in aliquid aspernatur.</span><span class="livre">Perspiciatis tempore quaerat a, perferendis ipsum quia at ullam ex voluptatibus reprehenderit atque? Quas dignissimos ratione molestiae error omnis laborum accusantium ut, quae minus repudiandae rerum doloribus alias at voluptate.</span>
        </div>

    </div>

    <script src="JSscripts/theme.js"></script>
</body>
</html>
