import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "public/assets/css/sikolam.css",
                "public/assets/js/sikolam.js",
            ],
            refresh: true,
        }),
    ],
});
