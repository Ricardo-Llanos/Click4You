<script setup>
// Aquí irá la lógica para manejar la búsqueda (submit)
import { ref } from 'vue';

const searchQuery = ref('');

const handleSearch = () => {
  // Lógica de búsqueda: Redirigir usando vue-router o hacer una llamada a la API
  if (searchQuery.value.trim()) {
    // Ejemplo de redirección programática:
    // router.push({ path: '/search', query: { q: searchQuery.value } });
    console.log('Buscando:', searchQuery.value);
    // Nota: Necesitarías inyectar 'router' para la navegación real
  }
};
</script>

<template>
  <form @submit.prevent="handleSearch" class="search-form">
    <div class="search-input-container">
      <input 
        type="text" 
        name="q" 
        placeholder="¿Qué vamos a buscar hoy?" 
        aria-label="Buscador de Productos"
        v-model="searchQuery"
      >
      <button type="submit" class="search-button">
        <img src="/img/buscar.png" alt="Botón de búsqueda"> 
      </button>
    </div>
  </form>
</template>

<style scoped>
/* Estilos tomados de .search-form, .search-input-container, .search-button */

.search-form {
  flex-grow: 1;
  margin: 0 20px;
}

.search-input-container {
  display: flex;
  border: 1px solid #ccc;
  border-radius: 7px;
  overflow: hidden;
}

.search-input-container input {
  flex-grow: 1;
  border: none;
  padding: 10px 15px;
  outline: none;
  font-size: 16px;
}

.search-button {
  background-color: #d19fe8;
  border: none;
  padding: 10px 15px;
  cursor: pointer;
}

.search-button img {
  height: 20px;
}
</style>