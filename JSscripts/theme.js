//recupere la collection de tous les "a"
let a = document.querySelectorAll("a");

//si l'utilisateur n'est jamais venu: cookie mis en sombre
if (document.cookie == ""){
    document.cookie = "themeCookie=Dark"
}

//raccourci pour ajouter des variables au style du document
let des = document.documentElement.style;


function setToDark() {
    // change les variables de couleur pour le theme sombre
    des.setProperty('--secondary', 'rgb(48, 52, 67)');
    des.setProperty('--third', 'rgb(62, 67, 87)');
    des.setProperty('--fontcolor', 'rgb(229, 226, 226)');
}

function setToBright() {
    // change les variables de couleur pour le theme clair
    des.setProperty('--secondary', 'rgb(229, 226, 226)');
    des.setProperty('--third', 'rgb(177, 177, 177)');
    des.setProperty('--fontcolor', 'rgb(0, 0, 0)');
}

//initialise les couleurs en fonction du theme de l'utilisateur de sa derniere visite
if (document.cookie.split(",")[0] == "themeCookie=Dark") {
    setToDark();
} else {
    setToBright();
}

function themeCookieChange(element) {
    //change le cookie de theme et lui ajoute une durée de 30 jours pour s'en souvenir
    let expires = (new Date(Date.now()+ 86400*30)).toUTCString();
    if (document.cookie == "themeCookie=Bright" && element.classList.contains("sombre")) {
        document.cookie = "themeCookie=Dark; expires=" + expires + ";path=/;"
    } else {
        document.cookie = "themeCookie=Bright; expires=" + expires + ";path=/;"
    }
}

function colorChange(element) {
    //change le theme du document
    if (document.cookie == "themeCookie=Bright" && element.classList.contains("clair") ) {
        setToBright();
    } else if (document.cookie == "themeCookie=Dark" && element.classList.contains("sombre")) {
        setToDark();
    }
}

for (let element of a) {
    element.addEventListener("click", () => {
        //eventListeners ajoutés pour changer le theme si les "a" sont cliqués
        themeCookieChange(element);
        colorChange(element);
    })
}