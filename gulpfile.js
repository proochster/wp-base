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

/*------------------------------------*\
    #FILE LOCATIONS
\*------------------------------------*/


    input = {
        'srcScss': 'src/resources/scss/**/*.scss',
        'srcInline': 'src/resources/scss/inline.scss',
        'srcLogin': 'src/resources/scss/login.scss',
        'componentsScss': 'src/components/**/*.scss',
        'jsPlugins': 'src/resources/js/plugins/*.js',
        'jsComponents': 'src/components/**/*.js',
        'input.wpPhp': 'wp-content/themes/wb-base/**/*.php'
    },

    output = {
        'wpStylesheets': `wp-content/themes/${themeName}`,
        'wpJavascript': `wp-content/themes/${themeName}/js`
    };


/*------------------------------------*\
    #GULP TASK THAT RUNS AT THE OUTSET
\*------------------------------------*/

gulp.task('default', ['theme-css', 'inline-css', 'login-css', 'build-js', 'serve'])

/*------------------------------------*\
    #BUILD CSS
\*------------------------------------*/

gulp.task('inline-css', function() {
    gulp.src(input.srcInline)
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(concat('inline.css'))
    .pipe(gulp.dest(output.wpStylesheets + "/assets"));
});

gulp.task('login-css', function() {
    gulp.src(input.srcLogin)
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(concat('login.css'))
    .pipe(gulp.dest(output.wpStylesheets + "/assets"));
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

gulp.task('serve', ['theme-css', 'inline-css', 'login-css', 'build-js'], function() {

    browserSync.init({
        proxy: localhost,
        notify: false
    });

    gulp.watch([input.srcScss, input.componentsScss], ['theme-css', 'inline-css', 'login-css']).on('change', browserSync.reload);
    gulp.watch(['*.html', '*.php']).on('change', browserSync.reload);
    gulp.watch([input.jsComponents], ['build-js']).on('change', browserSync.reload);
});

/*------------------------------------*\
    #BUILD JS
\*------------------------------------*/

gulp.task('build-js', function() {
    gulp.src([input.jsComponents])
    .pipe(wrapJS('(function (window, document, undefined) {%= body % }(window, document));'))
    .pipe(babel({
        // presets: ['es2015'],
        compact: true
    }))
    .on("error", notify.onError(function (error) {
        return error.message;
    }))
    .on("error", handleError)
    .pipe(concat('app.js'))
    .pipe(minify())
    .pipe(gulp.dest(output.wpJavascript));
});

function handleError(err) {
  this.emit('end');
}

