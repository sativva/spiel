var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    gutil = require('gulp-util'),
    browserSync = require('browser-sync'),
    plumber = require('gulp-plumber');
    cleanCSS = require('gulp-clean-css');
    sourcemaps = require('gulp-sourcemaps');
    concat = require('gulp-concat');

var reload = browserSync.reload;

// BROWSER SYNC
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "http://localhost/spielstation/spielstation-wp/"
    });
});

// ON ERROR FUNCTION
var onError = function (err) {
  gutil.beep();
  console.log(err);
};


// LESS
gulp.task('sass', function() {
  gulp.src('assets/scss/style.scss')
  .pipe(plumber({
      errorHandler: onError
    }))
    // .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(cleanCSS({compatibility: 'ie8'}))
    // .pipe(sourcemaps.write())
    .pipe(gulp.dest(''))
    .pipe(browserSync.reload({stream:true}));
});

// SCRIPT CONCAT
// gulp.task('scripts', function() {
//   return gulp.src('./assets/js/**/*.js')
//     .pipe(concat('main.js'))
//     .pipe(gulp.dest('./assets/js/'));
// });


// WATCH
gulp.task('watch', function() {
    gulp.watch('assets/scss/**/*.scss', function(){
        gulp.run('sass');
    });
    gulp.watch('**/*.php').on('change', reload);
    gulp.watch('**/*.js').on('change', reload);
    gulp.watch('**/*.css').on('change', reload);
});


gulp.task('default', ['sass', 'watch', 'browser-sync']);
