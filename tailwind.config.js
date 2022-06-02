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
        
    },
    colors: {
      gray : colors.gray,
      cyan : colors.cyan,
      yellow : colors.yellow,
      red : colors.red,
      blue : colors.blue,
      green : colors.green,
    },
  },
  plugins: [],
}
