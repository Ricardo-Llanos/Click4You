// JavaScript (en un archivo como resources/js/password-validation.js)

document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const passwordPopup = document.getElementById('password-popup');
    const requirements = {
        uppercase: document.getElementById('req-uppercase'),
        lowercase: document.getElementById('req-lowercase'),
        number: document.getElementById('req-number'),
        special: document.getElementById('req-special')
    };
    
    // Mostrar/ocultar el pop-up
    passwordInput.addEventListener('focus', () => {
        passwordPopup.style.display = 'block';
    });
    
    passwordInput.addEventListener('blur', () => {
        passwordPopup.style.display = 'none';
    });
    
    // Validar en tiempo real
    passwordInput.addEventListener('input', () => {
        const value = passwordInput.value;
        
        // Expresiones regulares para validar
        const hasUppercase = /[A-Z]/.test(value);
        const hasLowercase = /[a-z]/.test(value);
        const hasNumber = /[0-9]/.test(value);
        const hasSpecial = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(value);
        
        // Actualizar la clase CSS
        requirements.uppercase.classList.toggle('valid', hasUppercase);
        requirements.lowercase.classList.toggle('valid', hasLowercase);
        requirements.number.classList.toggle('valid', hasNumber);
        requirements.special.classList.toggle('valid', hasSpecial);
    });
});