'use strict';

module.exports = function() {
  $.gulp.task('watch', function() {
    $.gp.watch('./resources/assets/js/**/*.js', $.gulp.series('js:process'));
    $.gp.watch('./resources/assets/js/*.js', $.gulp.series('js:process'));
    $.gp.watch('./resources/assets/sass/**/*.scss', $.gulp.series('sass'));
  });
};
