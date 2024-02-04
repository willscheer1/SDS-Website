/* Hide dropdown nav menu */
function hideMenu() {
    document.getElementById("nav-menu").style.display = "";
    document.body.style.overflow = "auto";
}

/* Mobile Menu Button Function */
function displayMenu() {
    if (document.getElementById("nav-menu").style.display === "") {
        document.getElementById("nav-menu").style.display = "flex";
        document.body.style.overflowY = "hidden";
    }
    else if (document.getElementById("nav-menu").style.display === "flex") {
        hideMenu();
    }
}

/* Toggle off dropdown on window click */
window.onclick = function(event) {
    if (!event.target.matches("#mobile-menu-icon")) {
        hideMenu();
    }
}