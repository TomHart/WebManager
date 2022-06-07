module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
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
