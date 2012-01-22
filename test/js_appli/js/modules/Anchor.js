
define(["modules/Utils"], function(Utils) {
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
	return Anchor;
});
