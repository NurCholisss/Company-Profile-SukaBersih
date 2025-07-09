import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    server: {
        host: "localhost", // paksa gunakan localhost
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/admin.css",
                "resources/js/admin.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "./resources/js"),
        },
    },
});
