$(function() {
	// Prep MD-output code blocks for Prism
	$('code').each(function() {
		var language = $(this).attr('data-language') ? $(this).attr('data-language') : 'language-markup';
		$(this).addClass(language);

		if (language == 'language-bash' || language == 'language-ruby') {
			// Something broken with prism.js language-bash implementation
			$(this).closest('pre').addClass(language);
		}
	});
});
