//En caso de que el usuario esté autenticado, mostramos la vista de usuario autenticado
export function updateHeader() {
    const guestMenu = document.getElementById("guest-menu");
    const authMenu = document.getElementById("auth-menu");
    const authToken = localStorage.getItem("authToken");
    console.log("updateHeader");
    if (authToken) {
        if (guestMenu) guestMenu.style.display = "none";
        if (authMenu) authMenu.style.display = "flex";
    } else {
        if (guestMenu) guestMenu.style.display = "flex";
        if (authMenu) authMenu.style.display = "none";
    }
}

export function userPopUp() {
    const accountMenuTrigger = document.getElementById("account-menu-trigger");
    const userPopup = document.querySelector(".user-popup");

    if (accountMenuTrigger && userPopup) {
        accountMenuTrigger.addEventListener("click", (e) => {
            // Previene el comportamiento de enlace por defecto
            e.preventDefault();
            // Evita que el evento se propague al documento
            e.stopPropagation();

            // Alterna la visibilidad del pop-up
            const isVisible = userPopup.style.display === "block";
            userPopup.style.display = isVisible ? "none" : "block";
            userPopup.style.opacity = isVisible ? "0" : "1";
        });

        // Oculta el pop-up cuando se hace clic en cualquier lugar fuera de él
        document.addEventListener("click", (e) => {
            if (
                userPopup.style.display === "block" &&
                !accountMenuTrigger.contains(e.target)
            ) {
                userPopup.style.display = "none";
                userPopup.style.opacity = "0";
            }
        });
    }
}

export function logOut() {
    const logoutLink = document.getElementById("logout-link");
    if (logoutLink) {
        logoutLink.addEventListener("click", (e) => {
            e.preventDefault();

            localStorage.removeItem("authToken");
            updateHeader();
        });
    }
}

// Ejecuta la función al cargar el DOM en CADA PÁGINA
document.addEventListener("DOMContentLoaded", () => {
    updateHeader();
    userPopUp();
    logOut();
});
