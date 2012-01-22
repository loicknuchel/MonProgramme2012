
require({paths: {
		'jquery': "require_jquery",
		'shortcut': "require_shortcut"
	}
}
, ["modules/App"], function(App) {
	new App('#game').start();
});