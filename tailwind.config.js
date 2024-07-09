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
                xxs: "390px",
                xs: "450px",
                "3xl": "1920px",
                max: "2200px",
            },
            colors: {
                primary: {
                    400: "#3c4d6c",
                },
                secondary: {
                    400: "#f9beac",
                    600: "#ebb3a2",
                },
               background:{
                200: "#ffffff",
                300: "#fafafa",
               }

            },
        },
    },
    plugins: [],
};
