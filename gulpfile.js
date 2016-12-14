// https://css-tricks.com/gulp-for-beginners/
var gulp = require('gulp'),
    connect = require('gulp-connect-php'),
    browserSync = require('browser-sync');
var sass = require('gulp-sass');
// concatenate js and css
var useref = require('gulp-useref');
// minifying JavaScript files
var uglify = require('gulp-uglify');
// to ensure that we only attempt to minify JavaScript files
var gulpIf = require('gulp-if');
// minify css
var cssnano = require('gulp-cssnano');
// THIS NEEDS INSTALLING var imagemin = require('gulp-imagemin');
// to cache already optimized images
var cache = require('gulp-cache');
//Since we're generating files automatically, we'll want to make sure that files that are no longer used don't remain anywhere without us knowing.
var del = require('del');
// build task
var runSequence = require('run-sequence');

gulp.task('hello', function() {
  console.log('Hello Anne');
});

gulp.task('sass', function() {
  return gulp.src('app/scss/**/*.scss') // Gets all files ending with .scss in app/scss and children dirs
    .pipe(sass())
    .pipe(gulp.dest('app/css'))
})
 
gulp.task('watch', ['sass'], function() {
  gulp.watch('app/scss/**/*.scss', ['sass']);
  gulp.watch('app/*.html', browserSync.reload);
  gulp.watch('app/**/*.php', browserSync.reload);  
  gulp.watch('app/js/**/*.js', browserSync.reload); 
  connect.server({}, function (){
    browserSync({
      proxy: 'http://localhost:81/tb-php/app'
    });
  });
 
  gulp.watch('app/*.php').on('change', function () {
    browserSync.reload();
  });
  
});

gulp.task('useref', function(){
  return gulp.src('app/*.php')
    .pipe(useref())
    .pipe(gulpIf('*.js', uglify()))
    .pipe(gulpIf('*.css', cssnano()))
    .pipe(gulp.dest('dist'))
});

// THIS NEEDS INSTALLING
// gulp.task('images', function(){
//   return gulp.src('app/images/**/*.+(png|jpg|jpeg|gif|svg)')
//   // Caching images that ran through imagemin
//   .pipe(cache(imagemin({
//       interlaced: true
//     })))
//   .pipe(gulp.dest('dist/images'))
// });

gulp.task('fonts', function() {
  return gulp.src('app/fonts/**/*')
  .pipe(gulp.dest('dist/fonts'))
})

// gulp.task('build', function (callback) {
//   runSequence('clean:dist', 
//     ['sass', 'useref','fonts'],
//     callback
//   )
// })

