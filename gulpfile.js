// Include gulp
var gulp = require('gulp'),

// Include Our Plugins
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    cached = require('gulp-cached'),
    path = require('path'),
    merge = require('merge-stream');

var folders = ['public/scss'];

var sassConfig = {
    options: {
        outputStyle: 'compressed'
    }
};

// Compile Our Sass
gulp.task('sass', function() {
    var tasks = folders.map(function(element){
        return gulp.src(element + '/*.scss', {base: element + '/scss'})
            .pipe(sass(sassConfig.options))
            .pipe(cached('sass_compile'))
            .pipe(notify('Sass compiled <%= file.relative %>'))
            .pipe(gulp.dest('*'));
    });
    return merge(tasks);
});

// Watch Files For Changes
gulp.task('watch', function() {
    var tasks = folders.map(function(element){
        gulp.watch(element+ '/*.scss', ['sass']);
    });
});

// Run Task
gulp.task('run', ['sass', 'watch']);

// Default Task
gulp.task('default', ['run']);