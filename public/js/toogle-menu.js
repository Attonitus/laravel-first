
const $hamburguer = document.getElementById("hamburger");

$hamburguer.addEventListener("click", e => {
    const menu = document.getElementById("mobile-menu");

    menu.classList.toggle("hidden");
});