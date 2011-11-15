function set_fancyboxes(rel_to_root){
	welcome_fancybox(rel_to_root);
	supportus_fancybox(rel_to_root);
	create_category_fancybox(rel_to_root);
	suivi_quote_fancybox(rel_to_root);
}

// fancybox onload à la première visite
function welcome_fancybox(rel_to_root){
	if(localStorage){
		var welcome = localStorage.getItem("welcome");
		if(welcome != 1 && welcome_fancybox_enabled == true){
			localStorage.setItem("welcome", 1);
			$.fancybox({
				'href'				: rel_to_root+'inc/f_welcome.html',
				'title'				: '',
				'titleShow'			: false,
				'titlePosition'		: 'over',
				
				'autoDimensions'	: false,
				'width'         	: 600,
				'height'        	: 310,
				'centerOnScroll'	: true,
				'hideOnOverlayClick': true,
				'overlayShow'		: true,
				'overlayOpacity'	: 0.5,
				'overlayColor'		: '#666',
				'transitionIn'		: 'fade',
				'speedIn'			: 300,
				'transitionOut'		: 'fade',
				'speedOut'			: 300,
				'showCloseButton'	: true
			});
		}
	}
}

function supportus_fancybox(rel_to_root){
	$('.supportus').fancybox({
		'href'				: rel_to_root+'inc/f_supportus.html',
		'title'				: '',
		'titleShow'			: false,
		'titlePosition'		: 'over',
		
		'autoDimensions'	: false,
		'width'         	: 800,
		'height'        	: 500,
		'centerOnScroll'	: true,
		'hideOnOverlayClick': true,
		'overlayShow'		: true,
		'overlayOpacity'	: 0.5,
		'overlayColor'		: '#666',
		'transitionIn'		: 'fade',
		'speedIn'			: 300,
		'transitionOut'		: 'fade',
		'speedOut'			: 300,
		'showCloseButton'	: true
	});
}

function create_category_fancybox(rel_to_root){
	$('.new_quote form .create_category').fancybox({
		'href'				: rel_to_root+'inc/f_create_category.php',
		'title'				: '',
		'titleShow'			: false,
		'titlePosition'		: 'over',
		
		'autoDimensions'	: false,
		'width'         	: 280,
		'height'        	: 90,
		'centerOnScroll'	: true,
		'hideOnOverlayClick': true,
		'overlayShow'		: true,
		'overlayOpacity'	: 0.5,
		'overlayColor'		: '#666',
		'transitionIn'		: 'fade',
		'speedIn'			: 300,
		'transitionOut'		: 'fade',
		'speedOut'			: 300,
		'showCloseButton'	: true
	});
}

function suivi_quote_fancybox(rel_to_root){
	$('.quote .quote_header .options .suivi').fancybox({
		'href'				: rel_to_root+'inc/f_suivi_quote.php',
		'title'				: '',
		'titleShow'			: false,
		'titlePosition'		: 'over',
		
		'autoDimensions'	: false,
		'width'         	: 460,
		'height'        	: 140,
		'centerOnScroll'	: true,
		'hideOnOverlayClick': true,
		'overlayShow'		: true,
		'overlayOpacity'	: 0.5,
		'overlayColor'		: '#666',
		'transitionIn'		: 'fade',
		'speedIn'			: 300,
		'transitionOut'		: 'fade',
		'speedOut'			: 300,
		'showCloseButton'	: true
	});
}

function open_new_quote_category_fancybox(html_quote){
	var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
	
	$.fancybox({
		'href'				: './inc/f_new_quote_category.php?quote_id='+quote_id+'',
		'title'				: '',
		'titleShow'			: false,
		'titlePosition'		: 'over',
		
		'autoDimensions'	: false,
		'width'         	: 360,
		'height'        	: 140,
		'centerOnScroll'	: true,
		'hideOnOverlayClick': true,
		'overlayShow'		: true,
		'overlayOpacity'	: 0.5,
		'overlayColor'		: '#666',
		'transitionIn'		: 'fade',
		'speedIn'			: 300,
		'transitionOut'		: 'fade',
		'speedOut'			: 300,
		'showCloseButton'	: true
	});
}
