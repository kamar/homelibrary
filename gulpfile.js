const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const gulpcopy = require('gulp-copy');
const browsersync = require('browser-sync').create();

//Copy php files
function copyPHP(){
  return src('app/php/*.php')
    .pipe(dest('dist/php'));
}

// Sass Task
function scssTask(){
  return src('app/scss/*.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// JavaScript Task
function jsTask(){
  return src('app/js/*.js', { sourcemaps: true })
    .pipe(terser())
    .pipe(dest('dist', { sourcemaps: '.' }));
}

function copyToServer(){
  return src(['dist/*.*', 'dist/php/*.php', 'images/*.*', 'ics/*.*', 'pages/*.*', './index.php'], {"base": "."})
    .pipe(dest('/opt/lampp/docs/homelibrary'));

}

// Browsersync Tasks
function browsersyncServe(cb){
  browsersync.init({
    server: {
      baseDir: '.',
    browser: 'firefox'
    }
  });
  cb();
}

function browsersyncReload(cb){
  browsersync.reload();
  cb();
}

// Watch Task
function watchTask(){
  watch('*.html', browsersyncReload);
  watch('*.php', browsersyncReload);
  watch(['app/scss/**/*.scss', 'app/js/**/*.js', 'app/php/**/*.php', 'pages/**/*.php'], series(scssTask, jsTask, copyPHP, copyToServer, browsersyncReload));
}

// Default Gulp task
exports.default = series(
  scssTask,
  jsTask,
  copyPHP, 
  copyToServer,
  browsersyncServe,
  watchTask
);