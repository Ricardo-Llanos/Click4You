import axiosClient from "./axiosClient";

document.addEventListener("DOMContentLoaded", () => {
    const authToken = localStorage.getItem("authToken");

    if (authToken) {
        axiosClient.get("/user")
            .then((response) => {
                alert(
                    "Ya ha iniciado sesión. Redirigiendo a la vista principal..."
                );
                window.location.href="/";
                // window.location.href = "{{ route('app') }}";
            })
            .catch(error => {
                // Si la validación falla (ej. 401), el token no es válido
                console.error("Token no válido. Redirigiendo al login.");
                localStorage.removeItem("authToken");
            });

        return;
    }
    // Seleccionamos el formulario por su ID
    const loginForm = document.getElementById("sign-in-form");

    if (loginForm) {
        // console.log(endPointLogin);

        loginForm.addEventListener("submit", async (e) => {
            // Prevenimos el comportamiento por defecto del formulario (recargar la página)
            e.preventDefault();

            // Capturamos los valores de los inputs
            const email_ = document.getElementById("email").value;
            const password_ = document.getElementById("password").value;

            try {
                const response = await axiosClient.post("/sign-in", {
                    email: email_,
                    password: password_,
                });

                const { message, token, data } = response.data;

                localStorage.setItem("authToken", token);

                alert(message);
                window.location.href="/";

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
