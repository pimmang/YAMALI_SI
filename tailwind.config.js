import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        fontFamily: {
            body: ["Montserrat"],
        },
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            animation: {
                progress: "progress 3s linear forwards",
            },
            keyframes: {
                progress: {
                    "100%": {
                        transform: "translateX(-100%)", // Tambahkan unit (misalnya 'px' atau '%')
                    },
                },
            },
            height: {
                '10': "2.5rem", 
                '20': "5rem", 
                '30': "7.5rem", 
                '40': "10rem", 
                '50': "12.5rem", 
                '60': "15rem", 
                '70': "17.5rem", 
                '80': "20rem", 
                '90': "22.5rem", 
                '100': "255rem", 
                '110': "27.5rem", 
                '120': "30rem", 
                '130': "32.5rem", 
            },
        },
    },

    plugins: [forms],
};
