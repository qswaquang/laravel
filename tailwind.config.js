const colors = require('tailwindcss/colors')
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  plugins: [
    
  ],
  theme: {
    extend: {
      gridTemplateColumns: {

        '2': 'repeat(2, minmax(0, 1fr))',
        '3': 'repeat(3, minmax(0, 1fr))',

          // Complex site-specific column configuration
        'footer': '200px minmax(900px, 1fr) 100px',
        }
    },
    colors: {
      gray : colors.gray,
      cyan : colors.cyan,
      yellow : colors.yellow,
      red : colors.red,
      blue : colors.blue,
      green : colors.green,
      purple : colors.purple,
    },
  },
  plugins: [],
}
