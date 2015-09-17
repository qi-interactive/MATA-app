window.projectName = window.projectName || {
}


$(window).ready(function() {

	FastClick.attach(document.body);

	$("#footer").behavior("sticky-footer");

	$('#site-error').behavior("vertical-centering");

});
