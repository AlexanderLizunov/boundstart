'use strict';

module.exports = function () {
    $.gulp.task('imageMin', function () {
        return $.gulp.src('./source/img/*/*.*' )
            .pipe($.gp.imagemin())
            .pipe($.gulp.dest($.config.root + '/img'))
    })
};