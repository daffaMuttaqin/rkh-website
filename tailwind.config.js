/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./application/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primaryColor: '#F9A826',
      }
    },
    fontFamily: {
      display: ["Nunito", "sans-serif"]
    }
  },
  plugins: [],
}
