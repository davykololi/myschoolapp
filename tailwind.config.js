/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./src/**/*.{js,ts,jsx,tsx}",
        "./node_modules/tw-elements/dist/js/**/*.js",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/react-tailwindcss-datepicker/dist/index.esm.js"
    ],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/typography'),
      require('@tailwindcss/forms'),
      require('tw-elements/dist/plugin.cjs'),
      require('flowbite/plugin'),
      require('prettier-plugin-tailwindcss'),
      require('flowbite-typography'),
      require('tailwindcss-elevation'),
      require('tailwindcss-3d') ({ legacy: true }),
      require("daisyui"),
    ],
  darkMode: 'class',
};
