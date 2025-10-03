import { createRouter, createWebHistory } from 'vue-router';

// Importa las "Views" (Componentes de Página)
// Para empezar, solo necesitamos una página de inicio (HomePage)
import HomePage from '@/views/HomePage.vue'; 

const routes = [
  { 
    path: '/', 
    name: 'Home', 
    component: HomePage 
  },
  // Aquí se añadirán más rutas como /product/:slug, /cart, /sign-in, etc.
];

const router = createRouter({
  // Utiliza el historial del navegador para URLs limpias (ej. /cart)
  history: createWebHistory(), 
  routes,
});

export default router;