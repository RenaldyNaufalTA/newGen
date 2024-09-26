/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
export default {
    content: [
        "./resources/**/*.blade.php",
        // "./resources/views/auth/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins"],
                sans: [
                    "Helvetica",
                    "Arial",
                    "sans-serif",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
            colors: {
                primary: "#8D493A",
                secondary: "#D0B8A8",
                tertiary: "#DFD3C3",
                quaternary: "#F8EDE3",
            },
            backgroundImage: {
                logoV1: "url('/img/Choco.png')",
                logoV2: "url('/img/ChocoV2.png')",
            },
        },
    },
    plugins: [],
    safelist: [
        "bg-sky-400",
        "bg-red-400",
        "bg-teal-400",
        "bg-blue-400",
        "bg-lime-400",
        "hover:bg-sky-300",
        "hover:bg-red-300",
        "hover:bg-teal-300",
        "hover:bg-blue-300",
        "hover:bg-lime-300",
    ],
};
