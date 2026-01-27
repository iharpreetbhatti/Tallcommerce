import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import livewire from "@defstudio/vite-livewire-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: false,
        }),
        livewire({
            // <-- add livewire plugin
            refresh: ["resources/css/app.css"], // <-- will refresh css (tailwind ) as well
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
        hmr: {
            host: "tallcommerce.test", // Or 'localhost', '127.0.0.1', or specific IP
            port: 5173, // The port your Vite dev server is running on
            clientPort: 5173, // The port the client should connect to (often the same as 'port')
            protocol: "wss", // Or 'wss' if you are using HTTPS
        },
    },
});
