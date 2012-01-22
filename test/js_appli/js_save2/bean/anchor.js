
//define(["bean/utils"], function(Utils) {
//define(["bean/utils"], function() {
	var Anchor = function(anchor){
		var anchor = anchor;
		
		// private
		
		//public
		function disp(){
			Utils.output('info', 'anchor: '+anchor);
			return this;
		}

		return {
			disp: disp,
			get: function(){
				return anchor;
			}
		}
	}
	//return Anchor;
//});
