/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            screens: {
                xs: "390px",
                "3xl": "1920px",
                max: "2200px",
            },
            colors: {
                primary: {
                    400: "#3c4d6c",
                },
                secondary: {
                    400: "#f9beac",
                },
               

            },
        },
    },
    plugins: [],
};
