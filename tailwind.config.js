import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                violet: {
                    50: "#f5f3ff",
                    100: "#e6e5ff",
                    200: "#d0c6ff",
                    300: "#b9a6ff",
                    400: "#a084ff",
                    500: "#8e63ff",
                    600: "#7a50ff",
                    700: "#6a40d9",
                    800: "#5a30b3",
                    900: "#4a228d",
                },
            },
        },
    },

    plugins: [forms, typography],
};
