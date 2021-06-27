
// common
const gulp = require('gulp');
const { series, parallel, dest } = require('gulp');
const browserSync = require('browser-sync').create();
const rename = require('gulp-rename');
// エラーハンドリング
const plumber = require('gulp-plumber'); //監視ストップをしないようにする
// const notifier = require('gulp-notifier');

// optional
const zip = require('gulp-zip'); //zip化
const del = require('del'); //distの中身削除

// css
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('gulp-cssnano');
const autoprefixer = require('gulp-autoprefixer');
// JS
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const babel = require('gulp-babel');
// img
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache');
// html
const kit = require('gulp-kit');
const htmlmin = require('gulp-htmlmin');

// ファイルのパス
filesPath = {
  sass: './src/sass/**/*.scss',
  js: './src/js/**/*.js',
  images: './src/img/**/*.+(png|jpg|jpeg|gif|svg)',
  html: './html/**/*.kit',
};

// SASS

function sassTask() {
  return (
    gulp
      .src([filesPath.sass, '!./src/sass/not-compile.scss'])
      .pipe(plumber()) // errorによる監視のストップ防止
      // .pipe(plumber({errorHandler: notifier.error})) // error handling
      .pipe(sourcemaps.init()) //sourcemaps starts
      .pipe(sass()) //compile
      .pipe(autoprefixer()) //prefix
      .pipe(cssnano()) //minify
      .pipe(sourcemaps.write('.')) //sourcemaps ends
      // renameを関数でやる方法
      .pipe(
        rename(path => {
          // manファイルにはminをつけたくないのでif文
          if (!path.extname.endsWith('.map')) {
            path.basename += '.min';
          }
        })
      )
      .pipe(dest('./dist/css'))
  );
}

// JavaScript
function jsTask() {
  return (
    gulp
      // .src(filesPath.js)
      .src(['./src/js/project.js', './src/js/alert.js']) //concatの順番を指定したいとき
      .pipe(plumber()) // errorによる監視のストップ防止
      .pipe(
        babel({
          //トランスパイル
          presets: ['@babel/env'],
        })
      )
      .pipe(concat('project.js')) //project.jsに他のjsファイルをconcat
      .pipe(uglify()) //minify
      .pipe(
        rename({
          suffix: '.min',
        })
      )
      .pipe(dest('./dist/js'))
  );
}

// Images optimization
function imagesTask() {
  return gulp
    .src(filesPath.images)
    .pipe(cache(imagemin())) //imageを最適化、キャッシュを利用
    .pipe(dest('./dist/img/'));
}

// HTML kit templating
function kitTask() {
  return gulp
    .src(filesPath.html)
    .pipe(plumber()) // errorによる監視のストップ防止
    .pipe(kit()) //kitファイルをまとめる
    .pipe(
      htmlmin({
        //htmlをミニファイ化
        collapseWhitespace: true, //スペースを削除
      })
    )
    .pipe(dest('./'));
}

// Watch changes and browser-sync
function watch() {
  // browser-sync
  browserSync.init({
    server: {
      baseDir: './', //index.htmlをrootにおいている場合。
    },
    browser: 'google chrome',
    // firefox developer edition
  });
  // watch changes
  // gulp
  //   .watch(
  //     [
  //       filesPath.sass,
  //       // '**/*.html',
  //       filesPath.html,
  //       filesPath.js,
  //       filesPath.images,
  //     ],
  //     // seriesは順番に実行
  //     // gulp.series(['sass', 'javascript', 'imagemin', 'kit'])
  //     // 同時でOKな場合parallel
  //     parallel(['sassTask', 'jsTask', 'imagesTask', 'kitTask'])
  //   )
  //   .on('change', browserSync.reload);
  gulp.watch(filesPath.sass, sassTask).on('change', browserSync.reload);
  gulp.watch(filesPath.js, jsTask).on('change', browserSync.reload);
  gulp.watch(filesPath.html, kitTask).on('change', browserSync.reload);
  gulp.watch(filesPath.images, imagesTask).on('change', browserSync.reload);
}

// キャッシュのクリア
function clearCache() {
  return cache.clearAll();
}

// browser-sync
// gulp.task('browser-sync', function() {
//   browserSync.init({
//     server: {
//       baseDir: './' //index.htmlをrootにおいている場合。
//     },
//     browser: 'google chrome'
//     // firefox developer edition
//   })
// })

// watch changes
// gulp.task('watch', function() {
//   gulp.watch('./src/sass/**/*.scss', gulp.series(['sass']));
// });

// Serve
// gulp.task('serve', gulp.parallel(['sass', 'javascript', 'imagemin', 'kit']));

// Gulp default command
// watchコマンドをデフォルトにする
// gulp.task('default', gulp.series(['serve', 'watch']));

// Zip化
function zipTask() {
  return gulp
    .src(['./**/*', '!./node_modules/**/*'])
    .pipe(zip('project.zip'))
    .pipe(gulp.dest('./'));
}

// Clean 'dist' folder
function clean() {
  return del(['./dist/**/*']);
}

// Gulp individual tasks
exports.sassTask = sassTask;
exports.jsTask = jsTask;
exports.imagesTask = imagesTask;
exports.kitTask = kitTask;
exports.watch = watch;
exports.clearCache = clearCache;
exports.zipTask = zipTask;
exports.clean = clean;

// Gulp serve
exports.build = parallel(sassTask, jsTask, imagesTask, kitTask);

// Gulp default command
exports.default = series(exports.build, watch);
