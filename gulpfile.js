// Config
const config = {
	input: `frontend/src`,
	output: `frontend/dist`,
}

// Modules
const chalk = require('chalk')
const gulp = require('gulp')
const sass = require('gulp-sass')
const sassglob = require('gulp-sass-glob')
const minifycss = require('gulp-cssnano')
const plumber = require('gulp-plumber')
const exportSass = require('node-sass-export')
const uglify = require('gulp-uglify')
const rename = require('gulp-rename')
const concat = require('gulp-concat')
const del = require('del')
const postcss = require('gulp-postcss')
const postcssCombineMediaQuery = require('postcss-combine-media-query')
const _ = console.log

sass.compiler = require('sass')

/**
 * Default Task that runs when you type gulp in the console
 */
const defaultTask = function (done) {
	gulp.series('compileSass', 'watch')
	done()
}

const cleanUp = function (done) {
	_(chalk.blue(`♻️ Cleaning up old files`))
	del([config.output])
	done()
}

/**
 * Compile SASS
 *
 * Compiles your SASS files in to one stylesheet
 */
const compileSass = function () {
	_(chalk.green(`😃 Compiling CSS`))

	return (
		gulp
			.src([
				`${config.input}/sass/*.scss`,
				`${config.input}/sass/**/*.scss`,
			])

			// Compile SASS
			.pipe(sassglob())
			.pipe(
				sass({
					includePaths: [`${config.input}/sass`],
					functions: exportSass('.'),
				}).on('error', sass.logError)
			)
			.pipe(plumber())

			// Run it through PostCSS
			// .pipe(postcss([postcssCombineMediaQuery]))

			// Save it and update the browser
			.pipe(gulp.dest(config.output))

			// Minify
			.pipe(minifycss())

			// Add .min to the filename
			.pipe(
				rename(function (path) {
					path.basename += '.min'
				})
			)

			// Save it
			.pipe(gulp.dest(config.output))
	)
}

/**
 * Bundle Javascript
 *
 * Bundle Javascript files
 */
const bundleJS = function () {
	_(chalk.green(`🙂 Bundling Javascript`))

	// Get JS Files
	return (
		gulp
			.src([`${config.input}/js/bundle/*.js`])

			// Check for errors
			.pipe(plumber())

			// Bundle
			.pipe(concat(`bundle.js`))

			// Save!
			.pipe(gulp.dest(config.output))

			// Minify
			.pipe(uglify())

			// Add .min to the filename
			.pipe(
				rename(function (path) {
					path.basename += '.min'
				})
			)

			// Save!
			.pipe(gulp.dest(config.output))
	)
}

/**
 * Bundle JS
 * @param {*} done
 */
const minifyJS = function () {
	_(chalk.green(`😏 Minifying Javascript`))

	// Get JS Files
	return (
		gulp
			.src([`${config.input}/js/*.js`])

			// Check for errors
			.pipe(plumber())

			// Minify
			.pipe(uglify())

			// Add .min to the filename
			.pipe(
				rename(function (path) {
					path.basename += '.min'
				})
			)

			// Save!
			.pipe(gulp.dest(config.output))
	)
}

function watch(done) {
	_(chalk.blue(`👀 Watching assets for changes...`))

	// Watch .scss files
	gulp.watch(
		[
			`${config.input}/sass/*.scss`,
			`${config.input}/sass/**/*.scss`,
			`${config.input}/sass/**/**/*.scss`,
		],
		compileSass
	)

	// Watch bundle .js files
	gulp.watch([`${config.input}/js/bundle/*.js`], bundleJS)

	// Watch .js files
	gulp.watch([`${config.input}/js/*.js`], minifyJS)

	done()
}

const build = gulp.series([cleanUp, compileSass, minifyJS, bundleJS])
const watchAndSync = gulp.series(build, gulp.parallel(watch))

exports.default = defaultTask
exports.compileSass = compileSass
exports.watch = watchAndSync
exports.minifyJS = minifyJS
exports.bundleJS = bundleJS
exports.build = build
exports.cleanUp = cleanUp
