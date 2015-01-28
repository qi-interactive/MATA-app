var gulp = require('gulp'),
watch = require('gulp-watch'),
livereload = require('gulp-livereload'),
rename = require("gulp-rename"),
debug = require('gulp-debug'),
run = require('gulp-run'),

runSequence = require('run-sequence');

gulp.task('default', function() {
});

var less = require('gulp-less');
var path = require('path');

var projectName = "mata-application";
var userFolder;

gulp.task('copy-all-files', function() {

	// web/.htaccess does not copy
	gulp.src(['!node_modules/**', '**'])
	.pipe(gulp.dest(getUserHome() + "/Sites/" + projectName))

})

gulp.task('copy:all', function(callback) {
	runSequence('copy-all-files', 'execute-install');
});

// gulp.task('execute-install', function() {

// 	run('sh ' + getUserHome() + '/Sites/' + projectName + "/install.sh").exec();

// })

gulp.task('less', function() {

	console.log("LESS")

	gulp.src(['**/assets/less/*.less'])
	.pipe(less())
	.pipe(rename(function (path) {
		path.dirname = path.dirname.replace("/less", "/css")
	}))
	.pipe(gulp.dest("."))

	gulp.src(['assets/less/**/*.less', '!assets/less/imports/*.less'])
	.pipe(less())
	.pipe(gulp.dest("./web/css"))

})

gulp.task('watch', function() {

	watch(['commands/**/*.php', 'config/**/*.php', 'controllers/**/*.php', 'components/*.php', 'helpers/**/*.php', 'mail/**/*.php',
		'models/**/*.php', 'modules/**/*.php', 'modules/**/assets/**/*.{css,js}', 'views/**/*.php' ,'web/**/*.php', 'widgets/**/*.php', 
		'web/css/**/*.css', 'web/images/**/*.{png, jpg, gif}', 'web/js/*.js',
		'widgets/**/js/**/*.js', 'widgets/**/assets/css/*.css', 'widgets/**/web/*.css', 'assets/*.php'], {

			name: "Watcher",
			verbose: true
		})
	.pipe(gulp.dest(function(a) {
		return a.base.replace("/Code/", "/Sites/");
	}))
	.pipe(livereload());


	watch(['**/assets/less/*.less'])
	.pipe(less())
	.pipe(rename(function (path) {
		path.dirname = path.dirname.replace("/less", "/css")
	}))
	.pipe(gulp.dest("."))

	watch(['assets/less/**/*.less', '!assets/less/imports/*.less'])
	.pipe(less())
	.pipe(gulp.dest("./web/css"))

});



function getUserHome() {
  return process.env.HOME || process.env.HOMEPATH || process.env.USERPROFILE;
}


