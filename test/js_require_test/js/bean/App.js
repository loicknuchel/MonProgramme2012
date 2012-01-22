
define(["_jquery", "bean/Utils"], function($, Utils){
	function App(anchor_text){
		this.anchor = anchor_text;
		Utils.output('info', 'set anchor: '+anchor_text);
		
		function start(){
			Utils.output('info', 'start');
		}
		
		return {
			start: start
		}
	}
	
	return App;
});
