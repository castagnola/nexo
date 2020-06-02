var gulp = require('gulp');
var Elixir = require('laravel-elixir');
var jade = require('gulp-jade');
var gulpFilter = require('gulp-filter');
var templateCache = require('gulp-angular-templatecache');

Elixir.extend('templates', function () {
    new Elixir.Task('templates', function () {
        var jadeFilter = gulpFilter('**/*.jade');

        return gulp.src(['resources/views/templates/**/*'])
            .pipe(jadeFilter)
            .pipe(jade({}))
            .pipe(jadeFilter.restore())
            .pipe(templateCache({
                module: 'nexo.templates',
                standalone: true,
                transformUrl: function (url) {
                    return url.replace(/\.html$/, '')
                }
            }))
            .pipe(gulp.dest('public/assets/js'));
    }).watch('resources/views/templates/**/*');
});