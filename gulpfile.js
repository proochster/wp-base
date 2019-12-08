/*------------------------------------*\
    #REQUIRED DEPENDENCIES
\*------------------------------------*/

// Change the const 'themeName' to reflect the name of the theme
const 

/* Configuration variables */ 
    themeName = 'wp-base',
    localhost = 'wp-base.localhost',

/* Node packages */ 
    gulp = require('gulp'),
    wrapJS = require("gulp-wrap-js"),
    babel = require('gulp-babel'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass'),
    browserSync = require("browser-sync").create(),
    merge = require('merge-stream');
    notify = require("gulp-notify"),
    replace = require('gulp-replace'),
    autoprefixer = require('gulp-autoprefixer'),
    browsersToPrefix = ['> 5%', 'ie >= 7'],
    reload = browserSync.reload,
    minify = require('gulp-minify'),
    // fs = require('fs');
    // gutil = require('gulp-util'),
    // jshint = require('gulp-jshint'),
    // clean = require('gulp-clean'),
    // sourcemaps = require('gulp-sourcemaps'),
    // imagemin = require('gulp-imagemin'),
    // raster = require('gulp-raster'),
    // pngquant = require('imagemin-pngquant'),
    // minifycss = require('gulp-minify-css'),
    // inlineCss = require('gulp-inline-css'),
    // newer = require('gulp-newer'),
    // removeHtmlComments = require('gulp-remove-html-comments'),

/*------------------------------------*\
    #FILE LOCATIONS
\*------------------------------------*/


    input = {
        'srcScss': 'src/resources/scss/**/*.scss',
        'componentsScss': 'src/components/**/*.scss',
        'jsPlugins': 'src/resources/js/plugins/*.js',
        'jsComponents': 'src/components/**/*.js'
    },

    output = {
        'wpStylesheets': `wp-content/themes/${themeName}`,
        'srcStylesheets': 'src/resources/scss',
        'wpJavascript': `wp-content/themes/${themeName}/js`
    };


/*------------------------------------*\
    #GULP TASK THAT RUNS AT THE OUTSET
\*------------------------------------*/

gulp.task('default', ['theme-css', 'inline-css', 'build-js', 'serve'])

/*------------------------------------*\
    #BUILD CSS
\*------------------------------------*/

gulp.task('inline-css', function() {
    gulp.src('src/resources/scss/bundle.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(concat('inline.css'))
    .pipe(gulp.dest(output.wpStylesheets));
});

gulp.task('theme-css', function() {
    gulp.src('src/resources/scss/theme.css')
    .pipe(concat('style.css'))
    .pipe(gulp.dest(output.wpStylesheets));
});

// gulp.task('theme-css', function() {
//     const themeStream = gulp.src('src/resources/scss/theme.css'),
//         bundleStream = gulp.src('src/resources/scss/bundle.scss')
//                 .pipe(sass({
//                     outputStyle: 'compressed'
//                 }).on('error', notify.onError(function(error) {
//                     return error.message;
//                 })))
//                 .pipe(autoprefixer(browsersToPrefix))
//                 .pipe(reload({stream: true}));

//         return merge(bundleStream, themeStream)
//           .pipe(concat('style.css'))
//           .pipe(gulp.dest(output.wpStylesheets))
// });

/*------------------------------------*\
    #GULP SERVE - WATCHES FIELS AND SETS UP BROWSERSYNC
\*------------------------------------*/

gulp.task('serve', ['theme-css', 'inline-css', 'build-js'], function() {

    browserSync.init({
        proxy: localhost
    });

    gulp.watch([input.srcScss, input.componentsScss], ['theme-css', 'inline-css']).on('change', browserSync.reload);
    gulp.watch(input.wpPhp).on('change', browserSync.reload);
    gulp.watch([input.jsComponents], ['build-js']).on('change', browserSync.reload);
});

/*------------------------------------*\
    #BUILD JS
\*------------------------------------*/

gulp.task('build-js', function() {
    return gulp.src(input.jsComponents)
        .pipe(concat('app.js'))
        .pipe(babel({
            // presets: ['es2015'],
            compact: true
        }))
        .on("error", notify.onError(function (error) {
            return error.message;
        }))
        .on("error", handleError)
        .pipe(wrapJS('(function ($, window, document, undefined) {%= body % }(jQuery, window, document));'))
        .pipe(minify())
        .pipe(gulp.dest(output.wpJavascript));
});

function handleError(err) {
  this.emit('end');
}

