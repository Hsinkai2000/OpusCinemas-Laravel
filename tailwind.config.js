import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                white: "#ded7d7",
                primary: "#7597c9",
                secondary: "#282430",
                dark: "#3d3c52",
            },
            width: {
                "1/10": "10%",
                "1/8": "12.5%",
            },
            height: {
                "1/6": "16.66666667%",
                "30v": "30vh",
            },
        },
    },
    plugins: [],
};
