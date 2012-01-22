
define(["jquery"], function($){
	function App(anchor_text){
		this.anchor = anchor_text;
		//Utils.output('info', 'set anchor: '+anchor_text);
		alert('set anchor: '+anchor_text);
		
		function start(){
			//Utils.output('info', 'start');
			alert('start');
		}
		
		return {
			start: start
		}
	}
	
	return App;
});
