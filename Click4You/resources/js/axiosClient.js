// resources/js/axiosClient.js

import axios from 'axios';

const axiosClient = axios.create({
    // Define la URL base de tu API aquí
    baseURL: 'http://127.0.0.1:8000/api'
});

// Interceptor de peticiones
axiosClient.interceptors.request.use(config => {
    // Obtenemos el token del almacenamiento local
    const token = localStorage.getItem('authToken');

    // Si el token existe, lo añadimos a los encabezados de la petición
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    
    return config;
});

// Puedes añadir otros interceptores, por ejemplo, para manejar errores de respuesta
axiosClient.interceptors.response.use(
    response => response,
    error => {
        // Ejemplo de manejo de error 401 (No autorizado)
        if (error.response.status === 401) {
            console.log('Token expirado o no válido. Redirigiendo al login...');
            localStorage.removeItem('authToken');
            window.location.href = '/app';
        }
        return Promise.reject(error);
    }
);

export default axiosClient;