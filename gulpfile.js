/*------------------------------------*\
    #REQUIRED DEPENDENCIES
\*------------------------------------*/

// Change the const 'themeName' and 'themeNameChild' to reflect the name of the theme
const 

/* Configuration variables */ 
    themeName = 'wp-base',
    themeNameChild = 'wp-base-child',
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
        base: {
            'srcScss': 'src/resources/scss/**/*.scss',
            'srcStyle': 'src/resources/scss/style.scss',
            'srcLogin': 'src/resources/scss/login.scss',
            'componentsScss': 'src/components/**/*.scss',
            'jsPlugins': 'src/resources/js/plugins/*.js',
            'jsComponents': 'src/components/**/*.js',
            'input.wpPhp': `wp-content/themes/${themeName}/**/*.php`
        },
        child: {
            'srcScss': 'src-child/resources/scss/**/*.scss',
            'srcStyle': 'src-child/resources/scss/style-child.scss',
            'srcLogin': 'src-child/resources/scss/login-child.scss',
            'componentsScss': 'src-child/components/**/*.scss',
            'jsPlugins': 'src-child/resources/js/plugins/*.js',
            'jsComponents': 'src-child/components/**/*.js',
            'input.wpPhp': `wp-content/themes/${themeNameChild}/**/*.php`
        }
    },

    output = {
        base: {
            'wpStylesheets': `wp-content/themes/${themeName}`,
            'wpJavascript': `wp-content/themes/${themeName}/js`
        },
        child: {
            'wpStylesheets': `wp-content/themes/${themeNameChild}`,
            'wpJavascript': `wp-content/themes/${themeNameChild}/js`
        }
    };

/*------------------------------------*\
    #GULP TASK THAT RUNS AT THE OUTSET
\*------------------------------------*/

gulp.task('default', ['child'])

gulp.task('base', ['style-css:base', 'login-css:base', 'build-js:base', 'serve'])

gulp.task('child', ['style-css:child', 'login-css:child', 'build-js:child' /*,'serve'*/])

/*------------------------------------*\
    #BUILD BASE CSS
\*------------------------------------*/

gulp.task('style-css:base', function() {
    var themeStream,
        styleStream,
        dashIconsStream;

        themeStream = gulp.src('src/resources/scss/theme.css');
        dashIconsStream = gulp.src('wp-includes/css/dashicons.min.css');
        styleStream = gulp.src('src/resources/scss/style.scss')
                .pipe(sass({
                    outputStyle: 'compressed'
                }).on('error', notify.onError(function(error) {
                    return error.message;
                })))
                .pipe(autoprefixer(browsersToPrefix))
                .pipe(reload({stream: true}));

        return merge(styleStream, dashIconsStream, themeStream)
          .pipe(concat('style.css'))
          .pipe(gulp.dest(output.base.wpStylesheets))
});

gulp.task('login-css:base', function() {
    gulp.src(input.base.srcLogin)
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(concat('login.css'))
    .pipe(gulp.dest(output.base.wpStylesheets + "/assets"));
});

/*------------------------------------*\
    #BUILD CHILD CSS
\*------------------------------------*/

gulp.task('style-css:child', function() {
    var themeStream,
        styleStream,
        dashIconsStream;

        themeStream = gulp.src('src-child/resources/scss/theme-child.css');
        dashIconsStream = gulp.src('wp-includes/css/dashicons.min.css');
        styleStream = gulp.src('src-child/resources/scss/style-child.scss')
                .pipe(sass({
                    outputStyle: 'compressed'
                }).on('error', notify.onError(function(error) {
                    return error.message;
                })))
                .pipe(autoprefixer(browsersToPrefix))
                .pipe(reload({stream: true}));

        return merge(themeStream, styleStream, dashIconsStream)
          .pipe(concat('style.css'))
          .pipe(gulp.dest(output.child.wpStylesheets))
});

gulp.task('login-css:child', function() {
    gulp.src(input.child.srcLogin)
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(concat('login.css'))
    .pipe(gulp.dest(output.child.wpStylesheets + "/assets"));
});

/*------------------------------------*\
    #BUILD JS
\*------------------------------------*/

gulp.task('build-js:base', function() {
    gulp.src([input.base.jsComponents])
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
    .pipe(gulp.dest(output.base.wpJavascript));
});

gulp.task('build-js:child', function() {
    gulp.src([input.base.jsComponents, input.child.jsComponents])
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
    .pipe(gulp.dest(output.child.wpJavascript));
});

function handleError(err) {
    this.emit('end');
}

/*------------------------------------*\
    #GULP SERVE - WATCHES FIELS AND SETS UP BROWSERSYNC
\*------------------------------------*/

gulp.task('serve', ['style-css:base', 'login-css:base', 'build-js:base'], function() {

    browserSync.init({
        proxy: localhost,
        notify: false
    });

    gulp.watch([input.base.srcScss, input.base.componentsScss], ['style-css:base', 'login-css:base']).on('change', browserSync.reload);
    gulp.watch(['*.html', '*.php']).on('change', browserSync.reload);
    gulp.watch([input.base.jsComponents], ['build-js:base']).on('change', browserSync.reload);
});