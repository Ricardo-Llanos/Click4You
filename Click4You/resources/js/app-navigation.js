document.addEventListener('DOMContentLoaded', () => {
    // El área que se actualizará (del layout principal)
    const contentArea = document.getElementById('main-content-area');
    
    // Los enlaces que activan la navegación dinámica
    const navLinks = document.querySelectorAll('.js-nav-link');

    const loadContent = async (url, pushState = true) => {
        try {
            contentArea.style.opacity = '0.5';

            // 1. Petición fetch normal (obtiene la página COMPLETA)
            const response = await fetch(url);
            if (!response.ok) throw new Error(`Error HTTP: ${response.status}`);
            const fullHtml = await response.text();
            
            // 2. Analizar el HTML completo
            const parser = new DOMParser();
            const doc = parser.parseFromString(fullHtml, 'text/html');

            // 3. ⭐ EXTRAER SOLO EL CONTENIDO DINÁMICO ⭐
            // Busca el div contenedor que creamos en user/profile.blade.php
            const newContentWrapper = doc.querySelector('#dynamic-content-wrapper');

            if (!newContentWrapper) {
                // Si esto falla, verifica que todas tus vistas de contenido tienen el div#dynamic-content-wrapper
                throw new Error('No se pudo encontrar el contenedor dinámico (#dynamic-content-wrapper) en la respuesta de la página.');
            }

            // 4. Inyección del fragmento extraído
            // Se inyecta el contenido interno del wrapper en el área principal
            contentArea.innerHTML = newContentWrapper.innerHTML; 

            // Actualizar la URL y el historial
            if (pushState) {
                window.history.pushState({ path: url }, '', url);
            }
            
            contentArea.style.opacity = '1';

        } catch (error) {
            console.error('Error al cargar la vista:', error);
            contentArea.innerHTML = '<h1>Error de Navegación</h1><p>No se pudo cargar la vista solicitada. Verifique que el enlace es correcto y que la página contiene el div#dynamic-content-wrapper.</p>';
        }
    };

    // Adjuntar listeners a los enlaces .js-nav-link
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault(); 
            const url = link.getAttribute('href');
            if (url && url !== '#') {
                loadContent(url);
            }
        });
    });

    // Manejo del historial
    window.addEventListener('popstate', () => {
        loadContent(document.location.href, false);
    });
});