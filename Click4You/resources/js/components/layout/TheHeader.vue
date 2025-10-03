<script setup>
import SearchForm from '@/components/header/SearchForm.vue';
import UserActions from '@/components/header/UserActions.vue';
// Importamos el componente de Vue Router para los enlaces
import { RouterLink } from 'vue-router'; 
</script>

<template>
  <header class="main-header">
    <div class="header-container">
      
      <RouterLink to="/" class="logo-link">
        <img src="/img/logo-removebg-preview.png" alt="Logo CLICK4YOU"> 
        <span class="logo-text">CLICK<span class="logo-span">4YOU</span></span>
      </RouterLink>

      <div class="geo-info">
        <div class="location">
          <img src="/img/mapa.png" alt="Icono de mapa">
          <label>Perú</label>
        </div>
        <div class="currency-selector">
          <img src="/img/tasa-de-conversion.png" alt="Icono de moneda">
          <span>PEN</span>
          <img src="/img/flecha-correcta.png" alt="Flecha desplegable">
        </div>
      </div>

      <SearchForm />

      <UserActions />

    </div>
  </header>
</template>

<style scoped>
.main-header {
    background-color: #6a00c7;
    border-bottom: 1px solid #ffffff;
    /* Corrección: la sintaxis de padding es separada por espacio */
    padding: 10px 20px; 
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 100%;
    margin: 0 auto;
}

/* Estilos para el logo y el texto */
.logo-link {
  display: flex;
  align-items: center;
  text-decoration: none;
  font-size: 1.5em;
  font-weight: bold;
}

.logo-link img {
  height: 80px;
  margin-right: 0px;
}

.logo-text {
  color: #6a00c7;
}

.logo-span {
  color: #006cff;
}

/* Estilos para la ubicación y la moneda */
.geo-info {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-left: 20px;
}

.location,
.currency-selector {
  display: flex;
  align-items: center;
  gap: 5px;
}

.location img,
.currency-selector img {
  height: 24px;
}

#selector-lenguage{
  height: 11px;
}
</style>