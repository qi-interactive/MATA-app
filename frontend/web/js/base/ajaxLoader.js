window.mata = window.mata || {};
mata.simpleTheme = mata.simpleTheme || {};

mata.simpleTheme.ajaxLoader = {
	_timeout: null
};

var ajaxLoader = mata.simpleTheme.ajaxLoader;

mata.simpleTheme.ajaxLoader.run = function() {
	$("#progress-bar").width("0%").removeClass("success");

	clearTimeout(ajaxLoader._timeout);

	ajaxLoader._timeout = setTimeout(function() {

		$("#progress-bar").css("opacity", 1)

		ajaxLoader._timeout = setTimeout(function() {
			$("#progress-bar").width("15%");

			ajaxLoader._timeout = setTimeout(function() {
				$("#progress-bar").width("25%");

				ajaxLoader._timeout = setTimeout(function() {
					$("#progress-bar").width("35%");

					ajaxLoader._timeout = setTimeout(function() {
						$("#progress-bar").width("45%");
						ajaxLoader.slowRequestProgress()
					}, 500);
				}, 200);
			}, 200);
		}, 100);
	}, 200);
};

mata.simpleTheme.ajaxLoader.slowRequestProgress = function() {
	$("#progress-bar").width($("#progress-bar").width() + 10);
	ajaxLoader._timeout = setTimeout(ajaxLoader.slowRequestProgress, Math.random() * 100);
}

mata.simpleTheme.ajaxLoader.stop = function() {

	clearTimeout(ajaxLoader._timeout);

	$("#progress-bar").width("100%")

	ajaxLoader._timeout = setTimeout(function() {
		$("#progress-bar").addClass("success")
		ajaxLoader._timeout = setTimeout(function() {
			// $("#progress-bar").css("opacity", 0)
		}, 900)
	}, 150)
}

$(window).on("pjax:start", function(e, data) {
	mata.simpleTheme.ajaxLoader.run()
})

$(window).on("pjax:success", function(e, data) {
	mata.simpleTheme.ajaxLoader.stop()
	
})