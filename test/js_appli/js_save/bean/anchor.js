var Anchor = function(anchor){
	var anchor = anchor;
	return {
		get: function(){
			return anchor;
		},
		disp: function(){
			Utils.output('info', 'anchor: '+anchor);
			return this;
		}
	}
}
