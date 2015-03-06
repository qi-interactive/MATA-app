window.mata = window.mata || {};
mata.theme = mata.theme || {};


mata.theme.attachLoaderHandlers = function() {

	$(window).on('beforeunload', function(e) {
		parent.mata.simpleTheme.ajaxLoader.run();
	})

	$(document).ajaxSend(function() {
		parent.mata.simpleTheme.ajaxLoader.run();
		$( document ).one("ajaxStop", function() {
			parent.mata.simpleTheme.ajaxLoader.stop();
		});
	});
}


parent.mata.simpleTheme.navigator.updateURL(window.location.href);

mata.theme.attachLoaderHandlers();
