var elixir = require('laravel-elixir');

elixir(function(mix) {
	//minify css command
	// gulp --production
    mix.styles(['bootstrap.min.css',
    			'bootstrap-colorpicker.min.css', 
    			'font-awesome.min.css', 
    			'owl.carousel.css', 
    			'owl.theme.default.min.css',
    			'select2.min.css',
    			'stylesheets.css'], 'public/css/site.css');
    mix.styles(['bootstrap.min.css',
    			'bootstrap-colorpicker.min.css', 
    			'font-awesome.min.css', 
    			'owl.carousel.css', 
    			'owl.theme.default.min.css',
    			'select2.min.css',
    			'stylesheets-app.css'], 'public/css/app.css');
});
