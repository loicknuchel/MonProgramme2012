function launch() {
	
	// static object
	var MyMath = {
		PI: 3.14,
		v: 0,
		add: function(val){
			this.v += val;
			return this;
		},
		inc: function(){
			this.v++;
			return this;
		},
		disp: function(){
			alert(this.v);
		}
	};
	//MyMath.inc().disp();
	//alert(MyMath.PI);

	
	// object
	var Calc = function(base) {
		// private var
		var a = base;
		// private meth
		var substract = function(a, b){
			return a - b;
		}
		return {
			// public var
			base: (base) ? base : 0,
			// public meth
			inc: function(){
				this.base++;
				return this;
			},
			add: function(val){
				this.base += val;
				return this;
			},
			sub: function(val){
				this.base = substract(this.base, val);
				return this;
			},
			init: function(){
				this.base = a;
				return this;
			},
			disp: function(){
				//alert('base: '+this.base);
				console.log(this.base);
				return this;
			}
		}
	};
	var t = new Calc(2);
	//t.inc().disp().add(4).disp().sub(1).disp().init().disp();

	
	// object prototype
	var Person = function(name){
		this.name = name;
	};
	Person.prototype.say = function(){
		console.log('aff: '+this.name);
	}
	var loic = new Person("loic");
	//loic.say();
	
	
	// namespace et application
	var com = {};
	com.loic = {};
	com.loic.test = {};
	com.loic.test.calc = new Calc();
	com.loic.test.foo = function(){
		var a = 1;
		return {
			getA: function(){
				return a;
			}
		}
	}();
	console.log(typeof com.loic.test);
	console.log(com.loic.test.foo);
}
