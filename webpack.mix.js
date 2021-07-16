// webpack.mix.js

let mix = require('laravel-mix');

mix
.options({
  processCssUrls: false,
})
.js('src/js/app.js', 'dist/js')
.sass('src/sass/app.scss', 'dist/css')
.copyDirectory('src/images', 'dist/images')
mix.browserSync({
  files: [
      "src/**/*",
      "dist/**/*.*"
  ],
  proxy: {
      target: "http://localhost:10014/", //ここにurl
  }
});