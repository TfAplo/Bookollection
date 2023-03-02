//recuperation des éléments html a changer
let logChanger = document.querySelector("#changeLog");
let titre = document.querySelector("#titrelog");
let bouton = document.querySelector("#bouton-connecter");
let form = document.querySelector("form");
let inputMail = document.querySelector(".hidden")

//si cliqué change le texte des éléments
logChanger.addEventListener("click", () => {
    if (logChanger.innerText == "S'inscrire") {
        inputMail.classList.toggle("hidden")
        form.classList.add("anime")
        logChanger.innerText = "Se connecter";
        titre.innerText = "S'inscrire";
        bouton.value = "S'inscrire";
    } else {
        inputMail.classList.toggle("hidden")
        form.classList.remove("anime")
        logChanger.innerText = "S'inscrire";
        titre.innerText = "Se connecter";
        bouton.value = "Se connecter";
    }
})