// resources/js/register.js

import axiosClient from "./axiosClient";

document.addEventListener("DOMContentLoaded", () => {
    const registerForm = document.getElementById("sign-up-form");

    if (registerForm) {
        registerForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            // alert("Entrando en la validación");
            // Tomamos todos los datos
            const names = document.getElementById("names").value;
            const paternal_surname =
                document.getElementById("paternal_surname").value;
            const maternal_surname =
                document.getElementById("maternal_surname").value;
            const phone = document.getElementById("phone").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const password_confirmation = document.getElementById(
                "password_confirmation"
            ).value;

            // Elementos de la lista de validación de la contraseña
            const passwordMatchErrorSpan = document.getElementById(
                "password-match-error"
            );
            const lengthRule = document.getElementById("length-rule");
            const numberRule = document.getElementById("number-rule");
            const specialCharRule =
                document.getElementById("special-char-rule");
            const caseRule = document.getElementById("case-rule");

            try {
                const response = await axiosClient.post("/sign-up", {
                    names,
                    paternal_surname,
                    maternal_surname,
                    phone,
                    email,
                    password,
                    password_confirmation,
                });

                if (response.status === 201) {
                    alert("¡Registro exitoso! Por favor, inicia sesión.");
                    window.location.href = "/sign-in";
                }
            } catch (error) {
                console.error("Error en el registro:", error);
                if (error.response && error.response.data) {
                    const validationErrors = error.response.data.errors;
                    let errorMessage = "Ocurrió un error en el registro:\n";
                    for (const key in validationErrors) {
                        errorMessage += `- ${validationErrors[key].join(
                            ", "
                        )}\n`;
                    }
                    alert(errorMessage);
                } else {
                    alert(
                        "Ocurrió un error al conectar con el servidor. Inténtalo de nuevo."
                    );
                }
            }
        });
    }
});
