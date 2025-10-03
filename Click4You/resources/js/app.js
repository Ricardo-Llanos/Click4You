// import axiosClient from "./axiosClient";

import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; 

// Importa el Pinia (o Vuex) si ya lo tienes configurado, es necesario para la lógica del header
import { createPinia } from 'pinia';
const pinia = createPinia();

// Inicializa la aplicación Vue
const app = createApp(App);

// Conecta el router
app.use(router);

// 3. (Opcional) Conecta el Store (Pinia/Vuex)
app.use(pinia); 

// 4. Monta la aplicación en el div #app de Laravel Blade
app.mount('#app');

console.log('Aplicación Vue montada y lista.');