require(["jquery", "jquery.alpha", "jquery.beta", "App"], function($, App) {
    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.
    $(function() {
        $('body').alpha().beta();
		var u = new App('u');
    });
});
