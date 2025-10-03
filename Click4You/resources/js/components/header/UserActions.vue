<script setup>
import { computed, ref } from 'vue';
import { RouterLink } from 'vue-router';
// Importa tu store de Pinia/Vuex
import { useAuthStore } from '@/store/auth'; 
import { useCartStore } from '@/store/cart';

// Inicializa los stores
const authStore = useAuthStore();
const cartStore = useCartStore(); 

// Variables reactivas
const isAccountPopupOpen = ref(false);

// Propiedades computadas para la visibilidad
const isAuthenticated = computed(() => authStore.isAuthenticated);
const cartItemCount = computed(() => cartStore.totalItems); 
const wishlistCount = computed(() => authStore.wishlistCount); // Asumiendo que el store maneja la wishlist

const handleLogout = () => {
    authStore.logout(); // Llamada a la acción del store
    isAccountPopupOpen.value = false;
};
</script>

<template>
  <nav class="user-actions">
    
    <ul v-if="!isAuthenticated" id="guest-menu">
      <li><RouterLink to="/sign-in">Sign In</RouterLink></li>
      <li><RouterLink to="/sign-up">Sign Up</RouterLink></li>
    </ul>

    <ul v-else id="auth-menu">
      <li class="user-item">
        <RouterLink to="/wishlist" class="item-link">
          <img src="/img/favorito.png" alt="Wishlist">
          <span>WishList</span>
        </RouterLink>
        <span v-if="wishlistCount > 0" class="item-badge">{{ wishlistCount }}</span>
      </li>

      <li class="user-item">
        <RouterLink to="/cart" class="item-link">
          <img src="/img/carrito-de-compras.png" alt="Carrito">
          <span>Car</span>
        </RouterLink>
        <span v-if="cartItemCount > 0" class="item-badge">{{ cartItemCount }}</span>
      </li>

      <li class="user-item account-trigger" 
          @mouseover="isAccountPopupOpen = true"
          @mouseleave="isAccountPopupOpen = false">
        <a href="#" class="item-link">
          <img src="/img/usuario.png" alt="Cuenta">
          <span>Account</span>
        </a>
        <div class="user-popup" :class="{ 'is-visible': isAccountPopupOpen }">
          <div class="popup-options">
            <RouterLink to="/profile" class="js-nav-link">Perfil</RouterLink>
            <RouterLink to="/settings" class="js-nav-link">Configuración</RouterLink>
            <a href="#" @click.prevent="handleLogout">Cerrar Sesión</a>
          </div>
        </div>
      </li>
    </ul>
  </nav>
</template>

<style scoped>
/* Estilos de .user-actions, .user-item, .item-badge y el pop-up */

.user-actions ul {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
  gap: 1.5rem; /* Usamos la versión con rem para los íconos */
}

/* Estilos para enlaces de Sign In/Up (guest-menu) */
#guest-menu a {
  text-decoration: none;
  color: #000;
  font-size: 1em;
  font-weight: bold;
}

#guest-menu a:hover{
  color: #9a1fe0;
  text-decoration: underline;
}

/* Estilos comunes a auth-menu */
.user-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.user-item .item-link {
  text-decoration: none;
  color: #333;
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative; /* Fundamental para posicionar badges */
}

.user-item img {
  height: 24px;
  width: 24px;
}

.user-item span {
  font-size: 0.8rem;
  margin-top: 0.2rem;
}

.item-badge {
  position: absolute;
  top: -5px;
  right: -5px;
  /* Nota: 'var(--purple-primary)' asume que usas variables CSS globales */
  background-color: #6a00c7; /* Usé un color fijo por si no tienes la variable definida */
  color: white;
  border-radius: 50%;
  padding: 0.2rem 0.5rem;
  font-size: 0.7rem;
  font-weight: bold;
}

/* --- Estilos para el pop-up de usuario --- */
.account-trigger {
    position: relative; /* Fundamental para posicionar el pop-up dentro */
}

.user-popup {
    position: absolute;
    top: 100%;
    right: 0px;
    width: 200px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    z-index: 100;
    margin-top: 10px;
    
    /* Estilos para la transición: por defecto invisible */
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: opacity 0.2s ease-in-out, transform 0.2s ease-in-out, visibility 0.2s;
}

/* Estilo que Vue aplica cuando el estado de `isAccountPopupOpen` es `true` */
.user-popup.is-visible { 
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.popup-options {
    display: flex;
    flex-direction: column;
    padding: 10px;
}

.popup-options a {
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    transition: background-color 0.2s ease;
    text-align: left; /* Asegura que el texto esté alineado en el pop-up */
}

.popup-options a:hover {
    background-color: #f5f5f5;
    border-radius: 4px;
}
</style>