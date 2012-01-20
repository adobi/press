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
        
        <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.min.css" media="all" />
		<link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.custom.min.css" media="all" />
        <link rel = "stylesheet" href="<?= base_url() ?>css/press-release.css" media="all" />
    </head>
    
    <body>    
            <div class="navbar navbar-fixed">
              <div class="navbar-inner" style="padding:5px 0">
                <div class="container">
                    <h1 style="display:inline-block;">
                        <a  class="brand" href="<?php echo base_url() ?>press" style="color:#eee; font-size:0.9em;">Invictus Press </a>
                        <small>Latest press releases</small>
                    </h1>
                  
                    <div class="pull-right">
                      <ul class="nav">
                            <li class="vertical-divider"></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    Select one
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($all as $a): ?>
                                        <li><a href="<?php echo base_url() ?>press/<?php echo $a->url ?>"><?php echo $a->title ?></a></li>
                                    <?php endforeach ?>
                                </ul>                  
                            </li>
                      </ul>
                    </div>
                </div>
              </div>
            </div>        
        <div class="container" id="top">
            <div class="content">
