<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" style="overflow: hidden_">
    <head>
    	<title><?php echo SITE_TITLE ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->        
        
        <link rel = "stylesheet" href="<?php echo base_url() ?>css/aristo.css" media="all" />
        <link rel = "stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" media="all" />
        <link rel = "stylesheet" href="<?php echo base_url() ?>css/bootstrap-responsive.css" media="all" />
		<link rel = "stylesheet" href="<?php echo base_url() ?>css/bootstrap.custom.min.css" media="all" />
        <link rel = "stylesheet" href="<?php echo base_url() ?>css/press-release.css" media="all" />
        <link rel = "stylesheet" href="<?php echo base_url() ?>css/page.css" media="all" />
        <link rel = "stylesheet" href="<?php echo base_url() ?>scripts/plugins/file-upload/jquery.fileupload-ui.css" media="all" />
        <link rel = "stylesheet" href="<?php echo base_url() ?>scripts/plugins/colorpicker/farbtastic.css" media="all" />
    	<link rel = "stylesheet" href="<?php echo base_url() ?>scripts/plugins/redactor/js/redactor/css/redactor.css" />        
        <link rel = "stylesheet" href="<?php echo base_url() ?>scripts/plugins/fancybox/jquery.fancybox.css" media="all" />
        <link rel = "stylesheet" href="<?php echo base_url() ?>scripts/plugins/chosen/chosen.css" media="all" />
        <link rel = "stylesheet" href="<?php echo base_url() ?>scripts/plugins/google-code-prettify/prettify.css" media="all" />

        <!-- 
        <script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script>
         -->
    </head>
    
    <body>    
        	
        <?php if ($this->uri->segment(1) !== 'auth' && $this->session->userdata('logged_in')): ?>
            <div class="navbar navbar-fixed">
              <div class="navbar-inner">
                <div class="container">
                  <a href="<?php echo  base_url() ?>dashboard/index/0" class="brand"><i class="mainpage"></i><?php echo SITE_TITLE ?></a>
                  <ul class="nav">
                      <li <?php echo $this->uri->segment(1) === 'pressrelease' && $this->uri->segment(2) === 'edit' ? 'class="active"' : '' ?>><a href="<?php echo base_url() ?>pressrelease/edit"><i class="w create-new"></i>Create a press release</a></li>
                      <li <?php echo $this->uri->segment(1) === 'platform' ? 'class="active"' : '' ?>><a href="<?php echo base_url() ?>platform">Platforms</a></li>
                      <li <?php echo $this->uri->segment(1) === 'settings' ? 'class="active"' : '' ?>><a href="<?php echo base_url() ?>settings">Settings</a></li>
                      <li><a href="#" class="toggle-help" style="color:#fff;"><strong>Help!</strong></a></li>
                      <!-- <li class="vertical-divider"></li>  -->
                      <li><a href="<?php echo base_url() ?>auth/logout" style="font-weight:bold"><i class="w off-w"></i>Logout</a></li>                      
                  </ul>
                </div>
              </div>
            </div>    
        <?php endif ?>    
        <div class="container" id="top" style="margin-top:70px;">
        	<!-- <div class="content" style="margin-top:70px;"> -->

                
