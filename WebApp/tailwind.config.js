module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  safelist: [
    {
      pattern: /.*/,
    },
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}
