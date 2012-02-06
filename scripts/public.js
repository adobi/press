(function($) {
	
	$(function() {

	    $('a[rel=twipsy]').tooltip();
        $('body').delegate('.copy-code', 'click', function() {
            var self = $(this);
            
            self.select();
        });	
        $('.the-video').fitVids();
    });
	
}) (jQuery);