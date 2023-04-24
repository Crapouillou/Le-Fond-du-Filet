const nav = document.getElementById("nav-smartphone");
const open = document.getElementById("menu_burger");
const close = document.getElementById("bouton-fermer");


// je créer l'évenements click l'ouverture et fermeture du menu
open.addEventListener("click", openNav);
close.addEventListener("click", closeNav);

// je définis le style de l'ouverture du menu

function openNav() {
  nav.style.width = "100%";
}


// pour fermer le menu il faut que la width soit de 0% pour qu"elle se ferme complétement

// je définis le style de la fermeture 

function closeNav() {
nav.style.width = "0%";
}


function checkWindowSize() {
  if (window.innerWidth < 640) {
    closeNav();
  }
}

// Événement pour détecter le changement de taille de la fenêtre
window.addEventListener('resize', checkWindowSize);

// Fermer le menu au chargement de la page si la largeur de la fenêtre est inférieure à 640px
checkWindowSize();