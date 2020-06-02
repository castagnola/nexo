var gulp = require('gulp');
var flatten = require('gulp-flatten');

gulp.task('fonts', function () {
    gulp.src('./bower_components/**/*.{ttf,eot,woff,woff2,svg}')
        .pipe(flatten())
        .pipe(gulp.dest('public/assets/fonts'));
});