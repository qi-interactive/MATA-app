var mata = {};
mata.simpleTheme = {
	iframe: $("#mata-content")
};

mata.simpleTheme.events = {
	IFRAME_LOADED: "st-IFRAME_LOADED"
}

$(window).resize(function() {
	$("#container").height($(this).height() - $(".cd-header").height());
}).resize();

jQuery(document).ready(function($){
	//toggle 3d navigation
	$('.cd-3d-nav-trigger').on('click', function(){
		toggle3dBlock(!$('.cd-header').hasClass('nav-is-visible'));
	});

	$('#subnav-overlay a').on('click', function(){
		toggle3dBlock(false)
	})

	//select a new item from the 3d navigation
	$('.cd-3d-nav a').on('mouseover', function(){
		var selected = $(this);
		selected.parent('li').addClass('cd-selected').siblings('li').removeClass('cd-selected');
		updateSelectedNav();
	});
	$('.cd-3d-nav a').on('click', function(e) {
		if ($(this).attr("data-subnav") != null) {
			showSubnav($(this).attr("data-subnav"))
			e.stopPropagation();
			return false;
		} else {
			updateSelectedNav('close');
		}
		
	})

	$(window).on('resize', function(){
		window.requestAnimationFrame(updateSelectedNav);
	});

	function toggle3dBlock(addOrRemove) {
		if(typeof(addOrRemove)==='undefined') addOrRemove = true;	
		$('.cd-header').toggleClass('nav-is-visible', addOrRemove);
		$('main').toggleClass('nav-is-visible', addOrRemove);
		$('.cd-3d-nav-container').toggleClass('nav-is-visible', addOrRemove);

		if (addOrRemove == false)
			hideSubnav();
	}

	function showSubnav(subnavId) {
		var overlay = $("#subnav-overlay");
		
		overlay.find("> div").hide();
		overlay.css({
			height: $(window).height() - $("nav").height(),
			top: $("nav").height()
		}).fadeIn();

		$("#subnav-" + subnavId).fadeIn();
	}

	function hideSubnav() {
		$("#subnav-overlay").fadeOut().find("> div").fadeOut();
	}

	//this function update the .cd-marker position
	function updateSelectedNav(type) {
		var selectedItem = $('.cd-selected'),
		selectedItemPosition = selectedItem.index() + 1, 
		leftPosition = selectedItem.offset().left,
		backgroundColor = selectedItem.data('color');

		$('.cd-marker').removeClassPrefix('color').addClass('color-'+ selectedItemPosition).css({
			'left': leftPosition,
		});
		
		if( type == 'close') {

			hideSubnav();
			$('.cd-marker').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				toggle3dBlock(false);
			});
		}
	}

	$.fn.removeClassPrefix = function(prefix) {
		this.each(function(i, el) {
			var classes = el.className.split(" ").filter(function(c) {
				return c.lastIndexOf(prefix, 0) !== 0;
			});
			el.className = $.trim(classes.join(" "));
		});
		return this;
	};
});