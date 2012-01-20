(function($) {
	
	$(function() {

	    
        $('body').delegate('.copy-code', 'click', function() {
            var self = $(this);
            
            self.select();
        });	
        	
    });
	
}) (jQuery);