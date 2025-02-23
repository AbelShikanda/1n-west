const mix = require("laravel-mix");

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
*/

mix
	.js("resources/js/app.js", "public/js")
	.sass("resources/sass/app.scss", "public/css") // Main app styles
	.sass("resources/sass/style.scss", "public/1n-west/css") // Styles for 1n-west
	.sass("resources/sass/bootstrap.scss", "public/1n-west/css") // Custom Bootstrap styles
	.sourceMaps();
