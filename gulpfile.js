const { src, dest } = require('gulp');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const gulpCleanCss = require('gulp-clean-css');

gulp.task('handleCss', function() {
  returngulp
    .src('./assets/css/*.css')
    .pipe(concat('index.css'))
    .pipe(gulpCleanCss())
    .pipe(gulp.dest('./dist/assets/css/'))
});

exports.default = function() {
  return src('assets/js/*.js')
    .pipe(uglify())
    .pipe(dest('dist/assets/js/'));
};
