<p align="right"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## BACKEND


## FRONTEND
1. **Instalamos TailwindCSS**

    ```
        cd tu_proyecto_laravel

        npm install -D tailwindcss @tailwindcss/vite
    ```

    - `npm install -D tailwindcss postcss autoprefixer` : Instala los paquetes de desarrollo necesarios.

    - `npx tailwindcss init -p` : Crea dos archivos de configuración: tailwind.config.js y postcss.config.js.



2. **Configuración del Archivo**
Configuramos los archivos generados
    
    - Abre el archivo vite.config.js en la raíz de tu proyecto y añade el plugin de Tailwind CSS.

        ```
            import { defineConfig } from 'vite';
            import laravel from 'laravel-vite-plugin';
            import tailwindcss from '@tailwindcss/vite'; // <-- Agrega esta línea

            export default defineConfig({
            plugins: [
                laravel({
                    input: [
                        'resources/css/app.css',
                        'resources/js/app.js',
                    ],
                    refresh: true,
                }),
                tailwindcss(), // <-- Y esta
            ],
        });
        ``` 
3. **Generamos el Archivo de Configuración de Tailwind**
    - Crea el tailwind.config.js donde puedes definir tus rutas de archivos y personalizar el diseño.

    `npx tailwindcss init` (NO APLIQUÉ ESTE MÉTODO);
    
3. **Instalación de DaisyUI**
    - Una vez instalado Tailwind, configuramos DaisyUI
        
        `npm install -D daisyui@latest`

4. **Integración de DaisyUI en Tailwind**
    - Ahora, añade DaisyUI como un plugin en tu archivo de configuración de Tailwind.

        ```
            Put Tailwind CSS and daisyUI in your CSS file (and remove old styles)

            resources/css/app.css
            @import "tailwindcss";

            @source "../**/*.blade.php";
            @source "../**/*.js";
            @source "../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php";
            @source "../../storage/framework/views/*.php";

            @plugin "daisyui";
        ```


5. **Uso de las Vistas**
    - Asegúrate que el archivo CSS compilado `(app.css)` esté enlazado en tu layout principal de Laravel.

        ```
            <head>
                ...
                @vite('resources/css/app.css')
            </head>
        ```