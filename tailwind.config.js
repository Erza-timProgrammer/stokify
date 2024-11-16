/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // Ini penting untuk dark mode
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
