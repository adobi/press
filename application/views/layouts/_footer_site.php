        <?php if ($site): ?>
            
            </div> <!-- /content -->   

        
        </div> <!-- /container -->
        <?php endif ?>

        
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
            	            
                	        _gaq.push(['_trackEvent', category, action, label, value, true]);
            	        } else {
                	        _gaq.push(['_trackEvent', category, action, label, value]);
            	        }
            	        
            	        //console.log('ga track event: ', elem);
        	        }                
                }
            }
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>scripts/plugins/slidesjs/slides.jquery.js"></script>
         
        <!-- 
        <link rel = "stylesheet" href="<?= base_url() ?>scripts/plugins/fancybox/jquery.fancybox-1.3.4.css" media="all" />
        <script src="<?php echo base_url() ?>scripts/plugins/fancybox/jquery.fancybox-1.3.4.js"></script>
         -->
        <script src="<?php echo base_url(); ?>scripts/plugins/raty/js/jquery.raty.min.js"></script>    	    
  	    
  		<?php if ($site): ?>
            <script type="text/javascript">
                (function($) {
                    $(function() {
                        //$('.pills').pills();
        
                        $('#slideshow').slides({
                            width: 450,
                            height: 350,
                            //play: 5000,
                            //pause: 2500,  
                            effect: 'slide, fade',
                            hoverPause: true,
                            paginationClass: 'slide-pagination'                                     
                        });
                        
                        //$("[rel=fancybox]").fancybox();    
                        
                        $('.star').each(function(i, v) {
                	        var self = $(v);
                	        
                	        self.raty({
                	            path: BASE_URL + 'scripts/plugins/raty/img/',
                	            start: self.attr('data-rate'), 
                	            readOnly:true
                            });
                	    });                            
                        
                	    //$('.game-info h1, .available-on h2, .reviews h2').lettering();
                	    
                	    $('[data-ga=1]').bind('click', function() {
                	        var self = $(this);
                            
                	        GA.track(self);
                	        
                	        return true;
                	    });
                	    
                	    $('body').delegate('.video-play', 'click', function() {
                	        var self = $(this);
                	        
                	        GA.track(self);
                	        
                	        self.load(BASE_URL+'site/video/'+self.attr('data-video-id'));
                	        
                	        return false;
                	    });
                    });
                }) (jQuery)
            </script>
  		    
  		<?php endif ?>
    </body>
</html>