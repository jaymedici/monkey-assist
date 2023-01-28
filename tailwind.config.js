const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/colors");
const plugin = require('tailwindcss/plugin');

const customColors = {
    primary: colors.indigo["600"],
    "primary-focus": colors.indigo["700"],
    "secondary-light": "#ff57d8",
    secondary: "#F000B9",
    "secondary-focus": "#BD0090",
    "accent-light": colors.indigo["400"],
    accent: "#5f5af6",
    "accent-focus": "#4d47f5",
    info: colors.sky["500"],
    "info-focus": colors.sky["600"],
    view: colors.slate["500"],
    "view-focus": colors.slate["600"],
    success: colors.emerald["500"],
    "success-focus": colors.emerald["600"],
    warning: "#ff9800",
    "warning-focus": "#e68200",
    error: "#ff5724",
    "error-focus": "#f03000",
  };

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                soft: "0 3px 10px 0 rgb(48 46 56 / 6%)",
                "soft-dark": "0 3px 10px 0 rgb(25 33 50 / 30%)",
            },
            colors: customColors,
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        plugin(({ addVariant, e }) => {
            addVariant('sidebar-expanded', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => `.sidebar-expanded .${e(`sidebar-expanded${separator}${className}`)}`);
            });
        })
    ],
};
