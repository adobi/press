            <!-- </div> --> <!-- /content -->   

        </div> <!-- /container -->
		<div id="loading-global">Working...</div>		
				

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
                    "<?php echo base_url() ?>scripts/plugins/redactor/js/redactor/redactor.js",
                    "<?php echo base_url() ?>scripts/plugins/fancybox/jquery.fancybox.pack.js",
                    "<?php echo base_url() ?>scripts/plugins/chosen/chosen.jquery.min.js",
                    "http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js",
                    "<?php echo base_url(); ?>scripts/plugins/file-upload/jquery.iframe-transport.js",
                    "<?php echo base_url(); ?>scripts/plugins/file-upload/jquery.fileupload.js",
                    "<?php echo base_url(); ?>scripts/plugins/file-upload/jquery.fileupload-ui.js",
                    "<?php echo base_url(); ?>scripts/plugins/scroll/jquery.scrollTo-min.js",
                    "<?php echo base_url() ?>scripts/plugins/google-code-prettify/prettify.js",
                    "<?php echo base_url() ?>scripts/plugins/charcounter/jquery.charcounter.js",
                    "<?php echo base_url() ?>scripts/plugins/prettify-upload/jquery.prettify-upload.js",
                    "<?php echo base_url() ?>scripts/page.js?<?php echo time(); ?>",
                    function() {
                    
                        <?php if ($this->session->flashdata('message')): ?>
                            $(function() {
                                App.showNotification("<?php echo $this->session->flashdata("message") ?>")
                            })
                        <?php endif ?>
                        
                        <?php if ($this->session->flashdata('trigger_tab')): ?>
                            $(function() {
                                $('a[href='+window.location.hash+']').trigger('click');		     
                            })
                        <?php endif ?>
                    }
            );
    	</script>
    	            
		<script type="text/javascript">
		    var App = App || {};
			App.URL = "<?php echo base_url() ?>";
		</script>
		
            <script type="text/javascript">
            </script>
    </body>
</html>