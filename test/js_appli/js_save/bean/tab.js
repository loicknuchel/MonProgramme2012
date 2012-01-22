var Tab = function(anchor){
	var tab = $(anchor);
	var anchor = new Anchor(anchor);
	var firstCell = tab.children().first().children().first().children().first();
	var currentCell = null;
	var currentCellClass = 'select';
	var xsize = calcXSize();
	var ysize = calcYSize();
	
	function updateCurCell(cell){
		if(currentCell != null){currentCell.removeClass(currentCellClass);}
		currentCell = cell;
		if(cell != null){currentCell.addClass(currentCellClass);}
	}
	
	function calcXSize() { return size(firstCell); }
	function calcYSize() { return size(firstCell.parent()); }
	function size(elt){
		var tmp = elt, x=0;
		while(tmp.html() != null){
			tmp = tmp.next();
			x++;
		}
		return x;
	}
	
	return {
		setCurCell: function(){
			if(arguments.length == 1){
				return this.setCurCell$cell.apply(this, arguments);
			} else if(arguments.length == 2){
				return this.setCurCell$coord.apply(this, arguments);
			} else {
				Utils.output('error', 'Tab.setCurCell(): too many arguments ('+arguments.length+')'); // ERROR !
			}
		},
		setCurCell$cell: function(cell){
			updateCurCell(cell);
			return this;
		},
		setCurCell$coord: function(x, y){
			var tmp = firstCell;
			for(i=1; i<x; i++){tmp = Cell.move(tmp, 'right');}
			for(j=1; j<y; j++){tmp = Cell.move(tmp, 'down');}
			if(tmp != null){updateCurCell(tmp);}
			return this;
		},
		moveCurCell: function(dir){
			var tmp = Cell.move(currentCell,dir);
			if(tmp != null){updateCurCell(tmp);}
			return this;
		},
		
		getFirstCell: function(){
			return firstCell;
		},
		getAnchor: function(){
			return anchor;
		},
		getXSize: function(){
			return xsize;
		},
		getYSize: function(){
			return ysize;
		},
		disp: function(){
			Utils.output('info', tab.html());
			return this;
		}
	}
}
