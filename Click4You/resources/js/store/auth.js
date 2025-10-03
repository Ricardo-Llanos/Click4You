import { defineStore } from 'pinia';

// Usa 'export const' para la exportación nombrada (¡Soluciona el error de la consola!)
export const useAuthStore = defineStore('auth', {
  
  // ==========================================================
  // ESTADO (STATE): Los datos
  // ==========================================================
  state: () => ({
    isAuthenticated: false, // ¿Está loggeado? (Lo usa TheHeader)
    user: null,             // Objeto con datos del usuario (nombre, email, etc.)
    wishlistCount: 0,       // Contador de la WishList (Lo usa TheHeader)
  }),

  // ==========================================================
  // ACCIONES (ACTIONS): La lógica para cambiar el estado o llamar APIs
  // ==========================================================
  actions: {
    /**
     * Simula el inicio de sesión. Aquí harías una llamada a tu API de Laravel.
     * @param {Object} credentials - Email y contraseña
     */
    async login(credentials) {
      // 1. Simulación de llamada a la API de Laravel (con fetch o Axios)
      // const response = await axios.post('/api/login', credentials); 
      
      // 2. Si la respuesta es exitosa:
      this.isAuthenticated = true;
      this.user = { id: 1, name: 'Ricardo', email: credentials.email };
      
      // 3. Puedes cargar otros datos del usuario
      this.fetchUserData(); 

      return true; // Éxito
    },
    
    /**
     * Carga datos iniciales (ej. después de login o al recargar la página)
     */
    async fetchUserData() {
      // Aquí se llamaría al endpoint /api/user para obtener datos del perfil
      // this.wishlistCount = response.data.wishlist.length; // Ejemplo
      this.wishlistCount = 5; // Valor simulado
    },

    /**
     * Cierra la sesión del usuario.
     */
    logout() {
      // 1. Llamada a la API de Laravel para invalidar la sesión
      // await axios.post('/api/logout'); 

      // 2. Limpiar el estado
      this.isAuthenticated = false;
      this.user = null;
      this.wishlistCount = 0;
    }
  }
});