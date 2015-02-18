var gulp = require('gulp'),
watch = require('gulp-watch'),
livereload = require('gulp-livereload'),
less = require('gulp-less'),
path = require('path'),
plumber = require('gulp-plumber'),
gutil = require('gulp-util'),
lessPluginCleanCSS = require('less-plugin-clean-css');

var sourcemaps = require('gulp-sourcemaps');

var cleanCSS = new lessPluginCleanCSS({ 
	advanced: true,
	keepSpecialComments : 0,
	keepBreaks: true
})

var options = {
	dontFail: true
} 

gulp.task('less', function() {

	// gulp.src(['**/assets/less/*.less'])
	// .pipe(less())
	// .pipe(rename(function (path) {
	// 	path.dirname = path.dirname.replace("/less", "/css")
	// }))
	// .pipe(gulp.dest("."))

	console.log("LESSING")
	gulp.src(['assets/less/**/*.less', '!assets/less/inuit.css/**/*'])
	.pipe(plumber(handleError))
	.pipe(less({
		paths: [ path.join(__dirname, 'less', 'less/inuit.css') ],
		plugins: [cleanCSS]
	}))
	.pipe(gulp.dest("./web/css"))
})

gulp.task('watch', function() {

	// watch(['commands/**/*.php', 'config/**/*.php', 'controllers/**/*.php', 'components/*.php', 'helpers/**/*.php', 'mail/**/*.php',
	// 	'models/**/*.php', 'modules/**/*.php', 'modules/**/assets/**/*.{css,js}', 'views/**/*.php' ,'web/**/*.php', 'widgets/**/*.php', 
	// 	'!web/css/**/*.css', 'web/images/**/*.{png, jpg, gif}', 'web/js/*.js',
	// 	'widgets/**/js/**/*.js', 'widgets/**/assets/css/*.css', 'widgets/**/web/*.css', 'assets/*.php'], {

	// 		name: "Watcher",
	// 		verbose: true
	// 	})

	// .pipe(livereload())


	watch(['**/assets/less/*.less', 'assets/less/**/*.less', '!assets/less/inuit.css/*.less'], {

		name: "LESS Watcher",
		verbose: true
	}, function() {
			// console.log(123123)
			gulp.start('less')
		})
	// .pipe(watch(['**/assets/less/*.less', 'assets/less/**/*.less', '!assets/less/inuit.css/*.less']))
	// .pipe(less({
	// 		paths: [ path.join(__dirname, 'less', 'less/inuit.css') ]
	// 	}))
	// .pipe(gulp.dest("./web/css"))
	// .pipe(livereload())



	// gulp.src(['**/assets/less/*.less', 'assets/less/**/*.less', '!assets/less/imports/*.less'])
	// .pipe(plumber(handleError))
	// .pipe(watch(['**/assets/less/*.less', 'assets/less/**/*.less', '!assets/less/imports/*.less']))
	// .pipe(less())
	// .pipe(gulp.dest("./web/css"))
	// .pipe(livereload())


});

function getUserHome() {
	return process.env.HOME || process.env.HOMEPATH || process.env.USERPROFILE;
}

function handleError(err) {
	var displayErr = gutil.colors.red(err);
	gutil.log(displayErr);
	gutil.beep();
	if (options.dontFail) {
		return true;
	} else {
		throw displayErr;
	}
}

gulp.task('default', ['less', 'watch']);