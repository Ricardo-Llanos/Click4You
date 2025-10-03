<script setup>
import TheHeader from '@/components/layout/TheHeader.vue';
import { RouterView } from 'vue-router'; // Importamos el componente de Vue para renderizar rutas
</script>

<template>
  <div id="app-container">
    
    <TheHeader />

    <main class="page-content-wrapper">
      <RouterView />
    </main>

    </div>
</template>

<style>
/* Estilos globales (NO SCOPED) para el cuerpo y el contenedor principal */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #ffffff;
}
.page-content-wrapper {
  padding: 20px;
  /* El contenido de cada página debe tener un margen superior para evitar que el header fijo lo tape */
  /* Si el header no es fijo, simplemente gestiona los paddings de tu layout principal */
}
</style>