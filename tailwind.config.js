import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                transparent: "transparent",
                current: "currentColor",
                amber: colors.amber,
                black: colors.black,
                blue: colors.blue,
                cyan: colors.cyan,
                emerald: colors.emerald,
                fuchsia: colors.fuchsia,
                gray: colors.neutral,
                blueGray: colors.slate,
                coolGray: colors.gray,
                warmGray: colors.stone,
                green: colors.green,
                indigo: colors.indigo,
                lime: colors.lime,
                orange: colors.orange,
                pink: colors.pink,
                purple: colors.purple,
                red: colors.red,
                rose: colors.rose,
                sky: colors.sky,
                teal: colors.teal,
                violet: colors.violet,
                yellow: colors.amber,
                white: colors.white,
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
