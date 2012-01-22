
//define(["libs/jquery-1.7.1.min", "libs/shortcut", "bean/tab", "bean/cell", "bean/anchor"], function($, shortcut, Tab, Cell, Anchor) {
//define(["libs/jquery-1.7.1.min", "libs/shortcut", "bean/tab", "bean/cell", "bean/anchor"], function() {
	var App = function(anchor){
		var app = $(anchor);
		var anchor = new Anchor(anchor);
		var game = new Tab(anchor);
		var draw_anchor = '#draw';
		var found_class = 'found';
		
		// private
		function moveFound(dir){
			$(anchor.get()+' .'+found_class).each(function(){
				$(this).removeClass(found_class);
				var tmp = Cell.move($(this), dir);
				if(tmp != null){tmp.addClass(found_class+'2');}
			});
			$(anchor.get()+' .'+found_class+'2').addClass(found_class);
			$(anchor.get()+' .'+found_class).removeClass(found_class+'2');
		}
		
		// public
		function start(){
			this.startListeners();
			return this;
		}
		
		function startListeners(){
			// active cell with mouse
			$(anchor.get()+" td").add(anchor.get()+" th").click(function(){
				game.setCurCell($(this));
			});
			$(anchor.get()+" td").add(anchor.get()+" th").mouseover(function(){
				game.setCurCell($(this));
			});
			
			// active cell with keyboard
			shortcut.add("left", function() { game.moveCurCell('left'); });
			shortcut.add("right",function() { game.moveCurCell('right'); });
			shortcut.add("up",	 function() { game.moveCurCell('up'); });
			shortcut.add("down", function() { game.moveCurCell('down'); });
			
			// edit
			$(anchor.get()+" th").dblclick(function(){
				$(this).addClass('found');
			});
			
			// drawing with mouse
			shortcut.add("esc", function() {
				if($(draw_anchor).html() == 'draw'){
					$(anchor.get()+" td").add(anchor.get()+" th").unbind('mouseout');
					$(draw_anchor).html('no draw');
				}
				else{
					$(anchor.get()+" td").add(anchor.get()+" th").mouseout(function(){
						$(this).addClass(found_class);
					});
					$(draw_anchor).html('draw');
				}
			});
			
			// mouve drawing
			shortcut.add("ctrl+left", function() { moveFound('left'); });
			shortcut.add("ctrl+right",function() { moveFound('right'); });
			shortcut.add("ctrl+up",	  function() { moveFound('up'); });
			shortcut.add("ctrl+down", function() { moveFound('down'); });
			return this;
		}
		
		return {
			start: start,
			startListeners: startListeners
		}
	}
	//return App;
//});
