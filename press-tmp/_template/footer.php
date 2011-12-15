
    
            <footer>
                <p>&copy; Invicts Games Ltd. <?php echo date('Y') ?></p>
            </footer>            
            
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
                    
                    //console.log(category, action, label, value, nonInteraction);
        	        if (category && action && label && value) {
        	            
            	        if (nonInteraction == '1') {
            	            
                	        _gaq.push(['_trackEvent', category, action, label, value, true]);
            	        } else {
                	        _gaq.push(['_trackEvent', category, action, label, value]);
            	        }
            	        
            	        //console.log('ga track event: ', elem);
        	        }                
                }
            }
        </script>
        <!-- 
        <script type="text/javascript" src="<?php echo base_url() ?>scripts/plugins/slidesjs/slides.jquery.js"></script>   	    
  	     -->
        <script type="text/javascript">
            (function($) {
                $(function() {
                    
                    $('[rel=twipsy]').twipsy();

                    
         	        $('body').delegate('.copy-code', 'click', function() {
         	            var self = $(this);
         	            
         	            
         	            
         	            self.select();
     	            });
     	            
            	    $('[data-ga=1]').bind('click', function() {
            	        var self = $(this);
                        //console.log(self);
            	        GA.track(self);
            	        
            	        return true;
            	    });     	            
                });
            }) (jQuery)
        </script>
  		    
    </body>
</html>