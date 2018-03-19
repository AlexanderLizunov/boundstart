'use strict';

global.$ = {
    config: require('./gulp/config'),
    path: {
        task: require('./gulp/paths/tasks'),
        js: 'source/js/**/*.js'
    },
    gulp: require('gulp'),
    del: require('del'),
    browserSync: require('browser-sync').create(),
    gp: require('gulp-load-plugins')()
};

$.path.task.forEach(function (taskPath) {
    require(taskPath)();
});

$.gulp.task('default', $.gulp.series(
    'clean',
    $.gulp.parallel(
        'sass',
        'sass-admin',
        'sass-trello',
        
        'js:process',
        'copy:image',

        'copyfonts',

        'watch'
    ),
    $.gulp.parallel(

        'watch'
    )
));
