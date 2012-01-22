
//define([], function() {
	var Utils = (function(){
		// private
		
		// public
		function output(level, text){
			if(level == 'debug' || level == 'info' || level == 'warning' || level == 'error'){
				console.log(text);
				if(level == 'warning' || level == 'error'){
					alert('!!! '+level+': '+text);
				}
			}
			return this;
		}
		
		return {
			output: output
		}
	})();
	//return Utils;
//});
