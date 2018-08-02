// Picture element HTML5 shiv
document.createElement( "picture" );

/**
 * After page loaded
 */
$(window).load(function() {
	$(".bg_loader").delay(500).fadeOut(500);
});

$(document).ready(function() {
	
	$("select").selectOrDie();
	
	$('.owl-carousel').owlCarousel({
	    navigation : false,
	    pagination : true,
	    slideSpeed : 300,
	    singleItem : true,
	    autoPlay : 50000,
	    stopOnHover : true,
	    responsiveRefreshRate : 400,
	    itemsCustom : [[0, 1], [568, 1], [768, 1], [1024, 1], [1280, 1]]
	});
	
	// Same height for the box
	$('.same-height').matchHeight();
	
	// Open Menu
	$('.btn-menu').on('click', function() {
		$('.menu-container').slideDown(300);
		$(this).removeClass('spaceInUp').addClass('magictime spaceOutUp');
		setTimeout(function() {
			$('.btn-menu-close').show().addClass('magictime spaceInUp');
		}, 600);
	});
	
	// Close Menu
	$('.btn-menu-close').on('click', function() {
		$('.menu-container').slideUp(300);
		$(this).removeClass('spaceInUp').addClass('spaceOutUp');
		setTimeout(function() {
			$('.btn-menu').show().addClass('magictime spaceInUp');
		}, 600);
	});
	
	// Open Search
	$('.btn-search').on('click', function() {
		$('.mm-window').show().addClass('slideLeftRetourn');
		$(this).removeClass('spaceInUp').addClass('spaceOutUp');
		setTimeout(function() {
			$('.btn-close').show().addClass('magictime spaceInUp');
		}, 600);
	});
	
	// Close Search
	$('.btn-close').on('click', function() {
		$('.mm-window').removeClass('slideLeftRetourn').addClass('slideLeft');
		$(this).removeClass('spaceInUp').addClass('spaceOutUp');
	});
	
});