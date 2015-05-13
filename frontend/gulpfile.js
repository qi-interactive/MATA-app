var gulp = require('gulp'),
watch = require('gulp-watch'),
livereload = require('gulp-livereload'),
less = require('gulp-less'),
path = require('path'),
rename = require("gulp-rename"),
plumber = require('gulp-plumber'),
gutil = require('gulp-util'),
lessPluginCleanCSS = require('less-plugin-clean-css');
var postcss      = require('gulp-postcss');
var autoprefixer = require('autoprefixer-core');

var cleanCSS = new lessPluginCleanCSS({ 
	advanced: true,
	keepSpecialComments : 0,
	keepBreaks: true
})

var options = {
	dontFail: true
} 

gulp.task('less', function() {

	gulp.src(['widgets/**/assets/less/*.less'])
	.pipe(plumber(handleError))
	.pipe(less({
		plugins: [cleanCSS]
	}))
	.pipe(rename(function(filepath) {
		filepath.dirname = "widgets/" + filepath.dirname.replace("less", "css");
	}))
	.pipe(gulp.dest("."))
	.pipe(postcss([ autoprefixer({ browsers: ['> 0%'] }) ]))
	.pipe(livereload());

	gulp.src(['assets/less/**/*.less', '!assets/less/inuit.css/**/*'])
	.pipe(plumber(handleError))
	.pipe(less({
		paths: [ path.join(__dirname, 'less', 'less/inuit.css', 'less/imports/**/*') ],
		plugins: [cleanCSS]
	}))
	.pipe(gulp.dest("./web/css"))
	.pipe(postcss([ autoprefixer({ browsers: ['> 0%'] }) ]))
	.pipe(gulp.dest("./web/css"))
	.pipe(livereload());
})

gulp.task('watch', function() {

	livereload.listen();

	watch(['**/assets/less/**/*.less', '!assets/less/inuit.css/*.less'], {
		name: "Watcher",
		verbose: true
	}, function() {
		gulp.start('less');
	})

	watch(['**/*.*', '!web/css/**/*', '!node_modules/**/*', '!**/assets/less/**/*', '!assets/less/inuit.css/*.less', '!runtime/**/*'], {
		name: "Watcher",
		verbose: true
	})
	.pipe(livereload());
});

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