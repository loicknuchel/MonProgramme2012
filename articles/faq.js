$(function(){
	setContactable('../');
	
	// formate et vérifie les formulaires (form_verification.js)
	FV_Form_Verification('');
	fill_forms();
	
	
	$('.display_params').click(function(){
		affiche_block($(this), 'Masquer les paramètres', 'Afficher les paramètres');
		return false;
	});
	$('.display_sample').click(function(){
		affiche_block($(this), 'Masquer l\'exemple', 'Afficher un exemple');
		return false;
	});
	
	function affiche_block(link, masque_text, affiche_text){
		link.next().slideDown(100);
		link.html(masque_text);
		link.unbind('click');
		link.click(function(){
			masque_block($(this), masque_text, affiche_text);
			return false;
		});
		return false;
	}
	
	function masque_block(link, masque_text, affiche_text){
		link.next().slideUp(100);
		link.html(affiche_text);
		link.unbind('click');
		link.click(function(){
			affiche_block($(this), masque_text, affiche_text);
			return false;
		});
		return false;
	}
	
	
	
	
	
	
	if (/Microsoft/.test(navigator.appName)) { return }

	window.onload = function () {
	  var menu = document.getElementById('menu');
	  var init = menu.offsetTop;
	  var docked;

	  // scroll menu : le menu se déplace en haut de la page lorsque l'on descend
	  window.onscroll = function () {
		if (!docked && (menu.offsetTop - scrollTop() < 0)) {
		  menu.style.top = 0;
		  menu.style.position = 'fixed';
		  menu.className = 'docked';
		  docked = true;
		} else if (docked && scrollTop() <= init) {
		  menu.style.position = 'absolute';
		  menu.style.top = init + 'px';
		  menu.className = menu.className.replace('docked', '');
		  docked = false;
		}
	  };


	  // drop down menu : l'id 'guide-link' affiche le l'id 'dropdown' au survol
	  (function () {
		var link     = document.getElementById('guide-link'),
			menu     = document.getElementById('menu'),
			dropdown = document.getElementById('dropdown');

		link.onmouseover = function () {
		  link.className = 'dark-red';
		  dropdown.style.display = 'block';
		};
		link.onmouseout = function (e) {
		  if (e.relatedTarget === dropdown) { return }
		  link.className = link.className.replace('dark-red', '');
		  hide ();
		};
		dropdown.onmouseout = function (e) {
		  var t = e.relatedTarget;

		  if (e.target == link) { return }

		  while (t !== document.body) {
			if (t == dropdown) { return }
			else               { t = t.parentNode }
		  } 
		  link.className = link.className.replace('dark-red', '');
		  hide ();
		};

		function hide() { dropdown.style.display = 'none' }
	  })();
	};

	function scrollTop() {
	  return document.body.scrollTop || document.documentElement.scrollTop;
	}
  });