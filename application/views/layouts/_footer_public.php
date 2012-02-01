                </div>
        </div> <!-- /container -->
        <footer style="margin-top:30px;">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <h4>Company</h4>
                        <ul class="unstyled">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="span3">
                        <h4>Top games</h4>
                        <ul class="unstyled">
                        <li><a href="#">Race of Champions</a></li>
                        <li><a href="#">Froggy Jump</a></li>
                        <li><a href="#">Greed Corp</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="footer-floor">
                <div class="container">
                    <p>
                        <strong>&copy;  <?php echo date('Y') ?> <a href="http://invictus.com">Invictus Games Ltd.</a>
                        All rights reserved. <a href="#">Terms</a> & <a href="http://privacy.invictus.com">Privacy</a></strong>
                    </p>
                </div>                
            </div>
        </footer>				

    	<script src = "<?php echo base_url() ?>scripts/plugins/headjs/head.min.js"></script> 
    	<script type="text/javascript">
    	    head.js("http://code.jquery.com/jquery-1.7.1.min.js", 
    	            "https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-dropdown.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-tab.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-transition.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-alert.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-modal.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-tooltip.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-popover.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-transition.js",
                    "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-collapse.js",                    
                    "<?php echo base_url() ?>scripts/plugins/event-tracking/jquery.trackevent.js",
                    "<?php echo base_url() ?>scripts/public.js?<?php echo time(); ?>"
            );
    	</script>
    	            
		<script type="text/javascript">
		    var App = App || {};
			App.URL = "<?php echo base_url() ?>";

		</script>     
    </body>
</html>