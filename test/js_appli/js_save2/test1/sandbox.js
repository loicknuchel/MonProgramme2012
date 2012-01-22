Core.register("module-name", function(sandbox){
	return {
		init: function(){
		//not sure if I'm allowed...
			if (sandbox.iCanHazCheezburger()){
				alert("thx u");
			}
		},
		destroy: function(){
		//destructor
		}
	};
});
