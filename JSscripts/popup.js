var modal = document.getElementById("myModal");
var btn = document.getElementById("bouton_compte");
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
const categoryButtons = document.querySelectorAll('button[data-category]');
            const popup = document.querySelector('#myModal .modal-content');
        
            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const category = button.dataset.category;
        
                    if (category === 'profil') {
                        popup.innerHTML = '<span class="close" id="closeButton">&times;</span><img alt="img_compte" id="img_popup" src="images/account_circle_clair-removebg-preview.png"><p>Nom d\'utilisateur: Sebastien Bernard </p><p>Mot de passe: *****************</p><p>Email: sebastien.bernard@gmail.com</p><p>Date de naissance: 19/06/1975</p><button id="deconnecter">Se déconnecter</button>';
                    } else if (category === 'securite') {
                        popup.innerHTML = '<span class="close" id="closeButton">&times;</span><h2>Sécurité</h2>';
                    } else if (category === 'soutenir') {
                        popup.innerHTML = '<span class="close" id="closeButton">&times;</span><h2>Soutenir</h2>';
                    } else if (category === 'assistance') {
                        popup.innerHTML = '<span class="close" id="closeButton">&times;</span><h2>Assistance</h2>';
                    } else if (category === 'a_propos') {
                        /* Rajouter les reseaux sociaux dans a propos ainsi que les createurs du site */
                        popup.innerHTML = '<span class="close" id="closeButton">&times;</span><h2>A propos</h2>';
                    }

                    const popupCloseButton = popup.querySelector('#closeButton');
                    popupCloseButton.onclick = function() {
                        modal.style.display = "none";
                    }
                    
                    const deconnecterButton = popup.querySelector('#deconnecter');
                    deconnecterButton.onclick = function() {
                        location.replace('connexion.html');
                    }
                    
                    modal.style.display = "block";
                });
            });

            window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };