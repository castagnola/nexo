var gulp = require('gulp');
var ngClassify = require('gulp-ng-classify');
var coffee = require('gulp-coffee');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var Elixir = require('laravel-elixir');

var $ = Elixir.Plugins;
var config = Elixir.config;

gulp.task('app-coffee:common', function () {
    return gulp.src('resources/assets/coffee/app/_common/**/*.coffee')
        .pipe(sourcemaps.init())
        .pipe(ngClassify({
            appName: 'nexo'
        }))
        .pipe(coffee({bare: true}))
        .on('error', function (e) {
            new Elixir.Notification().error(e, 'common app coffee Compilation Failed!');
            this.emit('end');
        })
        .pipe(concat('app.common.js'))
        .pipe($.if(config.production, $.uglify()))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./public/assets/js'));
});


gulp.task('app-coffee:admin', function () {
    return gulp.src('resources/assets/coffee/app/admin/**/*.coffee')
        .pipe(sourcemaps.init())
        .pipe(ngClassify({
            appName: 'nexo'
        }))
        .pipe(coffee({bare: true}))
        .on('error', function (e) {
            new Elixir.Notification().error(e, 'admin coffee Compilation Failed!');
            this.emit('end');
        })
        .pipe(concat('app.admin.js'))
        .pipe($.if(config.production, $.uglify()))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./public/assets/js'));
});


gulp.task('app-coffee:client', function () {
    return gulp.src('resources/assets/coffee/app/client/**/*.coffee')
        .pipe(sourcemaps.init())
        .pipe(ngClassify({
            appName: 'nexo'
        }))
        .pipe(coffee({bare: true}))
        .on('error', function (e) {
            new Elixir.Notification().error(e, 'client coffee Compilation Failed!');
            this.emit('end');
        })
        .pipe(concat('app.client.js'))
        .pipe($.if(config.production, $.uglify()))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./public/assets/js'));
});