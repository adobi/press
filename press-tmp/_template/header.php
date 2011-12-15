<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    	<title>Invictus Press Releases</title>
        <meta charset="utf-8">
        <meta name="Description" content="Invictus Press Releases">
        
        <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.min.css" media="all" />
        <link rel = "stylesheet" href="<?= base_url() ?>css/site.css" media="all" />
        
        <script src = "http://code.jquery.com/jquery-1.7.min.js"></script>
        <script type="text/javascript">
            BASE_URL = "<?php echo base_url() ?>";
        </script>
        
    </head>
    
    <body>  
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
        <div class="topbar">
            <div class="fill">
                <div class="container">
                <a href="<?php echo base_url() ?>" class="brand">Latest Invictus press releases</a>
                    <ul class="nav">
                        <li <?php echo $controller === '' || $controller === 'race-of-champions' ? ' class="active"' : '' ?>><a href="<?php echo base_url() ?>race-of-champions">Race Of Champions</a></li>
                        <!-- <li <?php echo $controller === 'mist-bouncer' ? ' class="active"' : '' ?>><a href="<?php echo base_url() ?>mist-bouncer">Mist Bouncer</a></li> -->
                        <li <?php echo $controller === 'greed-corp' ? ' class="active"' : '' ?>><a href="<?php echo base_url() ?>greed-corp">Greed Corp</a></li>
                        <li <?php echo $controller === 'santa-ride' ? ' class="active"' : '' ?>><a href="<?php echo base_url() ?>santa-ride">Santa Ride!</a></li>
                    </ul>
                </div>
            </div>
        </div>    
        <div class="container" id="top" style="margin-top:50px;">