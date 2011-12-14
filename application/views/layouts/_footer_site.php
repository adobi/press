    </div> <!-- container -->
    

        
        <script src = "<?php echo base_url() ?>scripts/plugins/bootstrap-dropdown.js"></script>
        <script src = "<?php echo base_url() ?>scripts/plugins/bootstrap-tabs.js"></script>
        
        <script type="text/javascript">
            var GA = {
                track: function(elem) 
                {
    	            var category = elem.attr('data-ga-category'),
    	                action = elem.attr('data-ga-action'),
    	                label = elem.attr('data-ga-label'),
    	                value = parseInt(elem.attr('data-ga-value'),10),
    	                nonInteraction = elem.attr('data-ga-noninteraction');
                    
                    console.log(category, action, label, value, nonInteraction);
        	        if (category && action && label && value) {
        	            
            	        if (nonInteraction == '1') {
            	            
                	        //_gaq.push(['_trackEvent', category, action, label, value, true]);
            	        } else {
                	        //_gaq.push(['_trackEvent', category, action, label, value]);
            	        }
            	        
            	        //console.log('ga track event: ', elem);
        	        }                
                }
            }
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>scripts/plugins/slidesjs/slides.jquery.js"></script>   	    
  	    
        <script type="text/javascript">
            (function($) {
                $(function() {
                    //$('.pills').pills();


            	    $('body').delegate('[data-ga=1]', 'click', function() {
            	        var self = $(this);
                        
            	        GA.track(self);
            	        
            	        return true;
            	    });
            	    
            	    $('body').delegate('.video-play', 'click', function() {
            	        var self = $(this);
            	        
            	        GA.track(self);
            	        
            	        self.load(BASE_URL+'press/video/'+self.attr('data-video-id'));
            	        
            	        return false;
            	    });
            	    
            	    $('body').delegate('.copy-code', 'click', function() {
            	        $(this).select();
            	    });
            	    
            	    $('body').delegate('.close-item', 'click', function() {
            	        $(this).parents('.item-container').empty();
            	    });            	    
            	    
            	    $('body').delegate('.show-item', 'click', function() {
            	        var self = $(this);
            	        
            	        self.parents('.item:first').find('.item-container').load(self.attr('href'), function() {
    
                            $('#image-slideshow, #video-slideshow').slides({
                                width: 450,
                                height: 350,
                                //play: 5000,
                                //pause: 2500,  
                                effect: 'slide, fade',
                                hoverPause: true,
                                paginationClass: 'slide-pagination'                                     
                            });            	            
            	        });
            	        
            	        return false;
            	    });            	    
                });
            }) (jQuery)
        </script>
  		    
    </body>
</html>