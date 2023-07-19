/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
        extend: {
          colors: {
            primary: '#ff6347',
            secondary: '#6495ed',
          },
        },
      },
    plugins: [],
  }
