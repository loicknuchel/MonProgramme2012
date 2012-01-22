
define(["jquery"], function($){
	Utils = (function(){
		function output(level, text){
			if(level == 'debug' || level == 'info' || level == 'warning' || level == 'error'){
				console.log(text);
				if(level == 'warning' || level == 'error'){
					alert('!!! '+level+': '+text);
				}
			}
		}
		
		return {
			output: output
		}
	})();
	
	return Utils;
});
