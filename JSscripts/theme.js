let a = document.querySelectorAll("a");
let root = document.querySelector("root")

for (let element of a) {
    element.addEventListener("click", () => {
        if (element.classList.contains("clair")) {
            document.documentElement.style.setProperty('--secondary', 'rgb(229, 226, 226)');
            document.documentElement.style.setProperty('--third', 'rgb(200, 200, 226)');
            document.documentElement.style.setProperty('--fontcolor', 'rgb(0, 0, 0)');
        } else {
            document.documentElement.style.setProperty('--secondary', 'rgb(48, 52, 67)');
            document.documentElement.style.setProperty('--third', 'rgb(62, 67, 87)');
            document.documentElement.style.setProperty('--fontcolor', 'rgb(229, 226, 226)');
        }
    })
}
