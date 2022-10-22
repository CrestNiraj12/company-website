const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "var(--primary)",
                secondary: "var(--secondary)",
                "primary-red": "var(--primary-red)",
                "primary-yellow": "var(--primary-yellow)",
                "secondary-light": "var(--secondary-light)",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
