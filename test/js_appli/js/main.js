
//require(["libs/jquery-1.7.1.min", "bean/app"], function() {
require(["libs/jquery-1.7.1.min", "libs/shortcut", "bean/app", "bean/tab", "bean/cell", "bean/anchor", "bean/utils"], function() {
	$().ready(function(){
		var game = new App('#game');
		game.start();
	});
});