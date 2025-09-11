import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/components/nav-menu-without-account.css",

                "resources/js/app.js",
                "resources/js/login.js",
                "resources/js/password-requeriments.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
