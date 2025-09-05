// resources/js/register.js

import axiosClient from "./axiosClient";

document.addEventListener("DOMContentLoaded", () => {
    const registerForm = document.getElementById("registerForm");

    if (registerForm) {
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
        const specialCharRule = document.getElementById("special-char-rule");
        const caseRule = document.getElementById("case-rule");

        // Función para actualizar el estado visual de una regla de validación de contraseña
        const updateRuleStatus = (element, isValid) => {
            const icon = element.querySelector("svg");
            const checkIcon = `<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />`;
            const xIcon = `<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />`;

            if (isValid) {
                element.classList.remove("text-error");
                element.classList.add("text-success");
                icon.innerHTML = checkIcon;
            } else {
                element.classList.remove("text-success");
                element.classList.add("text-error");
                icon.innerHTML = xIcon;
            }
        };

        // Función de validación de contraseña
        const validatePassword = () => {
            const password = passwordInput.value;
            const passwordConfirmation = passwordConfirmationInput.value;

            const isLongEnough = password.length >= 8;
            const hasNumber = /[0-9]/.test(password);
            const hasSpecialChar =
                /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(password);
            const hasMixedCase =
                /[a-z]/.test(password) && /[A-Z]/.test(password);

            updateRuleStatus(lengthRule, isLongEnough);
            updateRuleStatus(numberRule, hasNumber);
            updateRuleStatus(specialCharRule, hasSpecialChar);
            updateRuleStatus(caseRule, hasMixedCase);

            if (passwordConfirmation && password !== passwordConfirmation) {
                passwordMatchErrorSpan.classList.remove("hidden");
            } else {
                passwordMatchErrorSpan.classList.add("hidden");
            }

            return (
                isLongEnough &&
                hasNumber &&
                hasSpecialChar &&
                hasMixedCase &&
                password === passwordConfirmation
            );
        };

        // Función de validación general de campos (solo verifica si están vacíos)
        const validateField = (inputElement) => {
            if (inputElement.value.trim() === "") {
                inputElement.classList.add("border-error");
                return false;
            } else {
                inputElement.classList.remove("border-error");
                return true;
            }
        };

        // 2. Añadir event listeners para el evento 'blur'
        namesInput.addEventListener("blur", () => validateField(namesInput));
        paternal_last_nameInput.addEventListener("blur", () =>
            validateField(paternal_last_nameInput)
        );
        maternal_last_nameInput.addEventListener("blur", () =>
            validateField(maternal_last_nameInput)
        );
        phoneInput.addEventListener("blur", () => validateField(phoneInput));
        emailInput.addEventListener("blur", () => validateField(emailInput));
        passwordInput.addEventListener("input", validatePassword); // Usamos 'input' para feedback en tiempo real en la contraseña
        passwordConfirmationInput.addEventListener("input", validatePassword);


        //Validams 
        registerForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            // Realizar una última validación de todos los campos
            const isNamesValid = validateField(namesInput);
            const isPaternalValid = validateField(paternal_last_nameInput);
            const isMaternalValid = validateField(maternal_last_nameInput);
            const isPhoneValid = validateField(phoneInput);
            const isEmailValid = validateField(emailInput);
            const isPasswordValid = validatePassword();

            if (
                !isNamesValid ||
                !isPaternalValid ||
                !isMaternalValid ||
                !isPhoneValid ||
                !isEmailValid ||
                !isPasswordValid
            ) {
                alert("Por favor, corrige los errores en el formulario.");
                return;
            }
            try {
                const response = await axiosClient.post("/register", {
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
                    window.location.href = "/login";
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
