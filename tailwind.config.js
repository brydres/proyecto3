/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/*.{html,js,php}',
    './*.php',
    "./node_modules/flowbite/**/*.js",
  ],
  darkMode: 'class',
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

