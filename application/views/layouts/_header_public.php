<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" style="overflow: hidden_">
    <head>
    	<title><?php echo SITE_TITLE ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->        
        
        <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.css" media="all" />
		<link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.custom.min.css" media="all" />
        <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap-responsive.css" media="all" />
        <link rel = "stylesheet" href="<?= base_url() ?>css/press-release.css" media="all" />
        <link rel = "stylesheet" href="<?= base_url() ?>css/press-release-responsive.css" media="all" />
    </head>
    
    <body class="press-release">  
        <script type="text/javascript">
        
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-27718701-1']);
            _gaq.push(['_setDomainName', 'invictus.com']);
            _gaq.push(['_trackPageview']);
            
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        
        </script>     
      
            <div class="navbar navbar-fixed-top">
              <div class="navbar-inner" style="padding:5px 0">
                <div class="container">
                    <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                    <a  class="brand" href="<?php echo base_url() ?>press">Invictus Press <small style="color:#ccc; font-size:0.85em">Latest press releases</small></a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="divider-vertical"></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle orange btn <?php echo !$all ? 'disabled' : '' ?>" href="#" id="select-press-release">
                                    Select a press release
                                    <b class="caret"></b>
                                </a>
                                <?php if ($all): ?>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($all as $a): ?>
                                            <li><a href="<?php echo base_url() ?>press/<?php echo $a->url ? $a->url : $a->id ?>" <?php echo event_tracking($a, 'title') ?>><?php echo $a->title ? $a->title : '<em>No title</em>' ?></a></li>
                                        <?php endforeach ?>
                                    </ul>                  
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
            </div>        
        <div class="container" id="top">
            <div class="content">
