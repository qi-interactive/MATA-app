mata.simpleTheme.navigator = {};

var navigatorNamespace = mata.simpleTheme.navigator;

mata.simpleTheme.navigator.handleLink = function() {
	navigatorNamespace.navigate($(this).attr("href"));
	return false;
}

$(window).ready(function() {
	$("#w0 a").on("click", mata.simpleTheme.navigator.handleLink);

	mata.simpleTheme.iframe.on("load", function() {
		mata.simpleTheme.iframe.trigger(mata.simpleTheme.events.IFRAME_LOADED);
	})

})

mata.simpleTheme.navigator.navigate = function(href) {
	window.history.pushState(null, "", href)
	mata.simpleTheme.ajaxLoader.run();
	mata.simpleTheme.iframe.attr("src", href);
}