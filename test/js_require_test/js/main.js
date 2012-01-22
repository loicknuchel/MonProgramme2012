
//require(["libs/jquery-1.7.1.min", "bean/app"], function() {
require({
  paths: {
    _jquery: 'libs/jquery-1.7.1.min'
  }
},["_jquery", "bean/App", "bean/Utils"], function($, App, Utils) {
	$(function() {
		var game = new App('#game');
		game.start();
		/*var u = new Utils();
		u.output('info', 'coucou');*/
		Utils.output('info', 'coucou');
		$('#game').addClass('select');
	});
});