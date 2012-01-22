
define(["require_jquery", "modules/Utils"], function($, Utils) {
	var Cell = (function(){
		// private
		
		// public
		function move(cell, dir){
			var tmp = null;
				if(cell != null){
				if(dir == 'right'){
					tmp = cell.next();
				} else if(dir == 'left'){
					tmp = cell.prev();
				} else if(dir == 'down' || dir == 'up'){
					tmp = cell;
					x=0;
					while(tmp.prev().html() != null){
						tmp = tmp.prev();
						x++;
					}
					if(dir == 'down'){tmp = tmp.parent().next().children().first();}
					else if(dir == 'up'){tmp = tmp.parent().prev().children().first();}
					for(i=0;i<x;i++){
						tmp = tmp.next();
					}
				} else {
					Utils.output('error', 'Cell.move(cell, dir): invalid argument dir ('+dir+')'); // ERROR !
				}
				if(tmp.html() == null){tmp = null;}
			}
			return tmp;
		}
		
		
		return {
			move: move
		}
	})();
	return Cell;
});
