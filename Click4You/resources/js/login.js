import axiosClient from "./axiosClient";

document.addEventListener("DOMContentLoaded", () => {
    // Seleccionamos el formulario por su ID
    const loginForm = document.getElementById("loginForm");

    if (loginForm) {
        // console.log(endPointLogin);

        loginForm.addEventListener("submit", async (e) => {
            // Prevenimos el comportamiento por defecto del formulario (recargar la página)
            e.preventDefault();

            // Capturamos los valores de los inputs
            const email_ = document.getElementById("email").value;
            const password_ = document.getElementById("password").value;

            try {
                const response = await axiosClient.post("/login", {
                    email: email_,
                    password: password_,
                });

                const { token, data } = response.data;

                localStorage.setItem("authToken", token);
                alert("¡Inicio de sesión exitoso!");

                window.location.href = "/";

            } catch (error) {
                // Axios captura los errores de respuesta (4xx, 5xx) en el bloque 'catch'
                console.error("Error:", error);

                // Los datos del error, como los mensajes de validación, están en error.response.data
                if (error.response && error.response.data) {
                    alert(
                        `Error al iniciar sesión: ${error.response.data.message}`
                    );
                } else {
                    alert("Ocurrió un error al conectar con el servidor.");
                }
            }
        });
    }
});
