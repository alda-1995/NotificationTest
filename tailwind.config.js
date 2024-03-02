const plugin = require('tailwindcss/plugin')
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      container: {
        center: true,
        padding: {
          DEFAULT: '1rem',
          sm: '2rem',
          lg: '3rem',
          xl: '5rem',
          '2xl': '6rem',
        }
      },
    },
  },
  plugins: [
    plugin(function ({ addBase }) {
      addBase({
        '.font-main': {
          fontFamily: "'Roboto', sans-serif",
          fontSize: "calc(42px + (68 - 42) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 400,
        },
        '.font-secondary': {
          fontFamily: "'Roboto', sans-serif",
          fontSize: "calc(28px + (34 - 28) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.4,
          fontWeight: 400
        },
        '.font-base100': {
          fontFamily: "'Roboto', sans-serif",
          fontSize: "calc(18px + (24 - 18) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.4,
          fontWeight: 400,
          letterSpacing: 0.32
        },
        '.parrafo': {
          fontFamily: "'Roboto', sans-serif",
          fontSize: "calc(15px + (16 - 15) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.4,
          fontWeight: 300,
          letterSpacing: 0.32
        },
        '.small': {
          fontFamily: "'Roboto', sans-serif",
          fontSize: "calc(12px + (14 - 12) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 600,
          letterSpacing: 0.5
        },
        '.btn-font': {
          fontFamily: "'Roboto', sans-serif",
          fontSize: "calc(14px + (15 - 14) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 400
        },
      })
    })
  ],
}

