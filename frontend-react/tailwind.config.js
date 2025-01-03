/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./index.html",
      "./src/**/*.{js,ts,jsx,tsx}",
    ],
    theme: {
      extend: {
        fontFamily: {
            sans: ['Poppins', 'sans-serif'],  // Define Poppins como a fonte padrão
        },
        colors: {
            "primary-500": "#4979FB",
            "primary-600": "#3B62CE",
        },
      },
    },
    plugins: [],
  }
