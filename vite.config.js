import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";
export default ({ mode }) => {
    const { APP_URL } = loadEnv(mode, process.cwd(), "");

    return defineConfig({
        plugins: [
            laravel({
                input: [
                    "resources/css/app.css",
                    "resources/css/style.scss",
                    "resources/js/app.js",
                    "resources/js/partners.jsx",
                    "resources/js/users/main.jsx",
                    "resources/js/latest-book.js",
                    "resources/js/latest-book.js",
                    "resources/js/book-search.js",
                ],
                refresh: true,
            }),
            {
                // fixes URLs that start with / in CSS files
                // make sure to have vite.loadEnv imported and APP_URL defined
                name: "css-static-url-fixer",
                enforce: "post",
                apply: "serve",
                transform: (code, file) => {
                    if (mode === "development" && file.match(/\.s?css($|\?)/)) {
                        return {
                            code: code.replaceAll(
                                /url\(([\'\"]?)(\/[^\)\'\"]+)\1\)/g,
                                `url($1${APP_URL}$2$1)`
                            ),
                        };
                    }
                },
            },
            react(),
        ],
    });
};
