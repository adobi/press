<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" 
    <?php if ($_SERVER['HTTP_HOST'] !== 'localhost'): ?>
        style="overflow: hidden"
    <?php endif ?>
>
    <head>
    	<title>Microsites</title>
        <meta charset="utf-8">
        
        <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.min.css" media="all" />
        <link rel = "stylesheet" href="<?= base_url() ?>css/site.css" media="all" />
        
        <script src = "http://code.jquery.com/jquery-1.7.min.js"></script>
        <script type="text/javascript">
            BASE_URL = "<?php echo base_url() ?>";
        </script>
        
    </head>
    
    <?php if ($site): ?>
        
        <style type="text/css">
            body {
                background: <?php echo $site->body_background_color ?>;
            }        
            .container {
                background: <?php echo $site->background_color ?>;
            }
            .content {
                background-image:url('<?php echo base_url() ?>uploads/original/<?php echo $site->background_image ?>');
                background-color: <?php echo $site->background_color ?>;
                
            }
            
            
            <?php if ($site->game_title_color): ?>
                .game-title {
                    color: <?php echo $site->game_title_color ?>;
                }
            <?php endif ?>            
            
            .review-item {
                //border-bottom:10px solid <?php echo $site->background_color ?>;
            }
            
            .content > * {
                color: <?php echo $site->font_color ?>;
            }
            
            .content a {
                color: <?php echo $site->link_color ?>!important;
            }
            
            <?php if ($site->about_background_color): ?>
                .game-info {
                    background: <?php echo $site->about_background_color ?>;
                }
            <?php endif ?>
            
            <?php if ($site->reviews_background_color): ?>
                .reviews {
                    background: <?php echo $site->reviews_background_color ?>;
                }
            <?php endif ?>
            <?php if ($site->stores_background_color): ?>
                .available-on {
                    background: <?php echo $site->stores_background_color ?>;
                }
            <?php endif ?> 
            
            <?php if ($site->section_title_color): ?>
                .section-title {
                    color: <?php echo $site->section_title_color ?>;
                }
            <?php endif ?>  
            
            <?php if ($site->bubble_border_color): ?>
                .popover.below .arrow {
                    border-bottom:5px solid <?php echo $site->bubble_border_color ?>;
                }
            <?php endif ?> 
            
            <?php if ($site->bubble_background_color): ?>
                .popover .title, .popover .inner {
                    background: <?php echo $site->bubble_background_color ?>;
                }
            <?php endif ?>
            
            <?php if ($site->bubble_color): ?>
                .popover .title {
                    color: <?php echo $site->bubble_color ?>;
                }
            <?php endif ?>  
            
            <?php if ($site->reviews_link_color): ?>
                .review-item .title a {
                    color: <?php echo $site->reviews_link_color ?>!important;
                }
            <?php endif ?>  
            
            <?php if ($site->reviews_press_color): ?>
                .review-item .press {
                    color: <?php echo $site->reviews_press_color ?>;
                }
            <?php endif ?>  
            
            <?php if ($site->page_link_color): ?>
                .slide-pagination li a {
                    background: <?php echo $site->page_link_color ?>;
                }
            <?php endif ?>  
            
            <?php if ($site->page_active_color): ?>
                .slide-pagination li a:hover, .slide-pagination li.current a {
                    background: <?php echo $site->page_active_color ?>;
                }
            <?php endif ?>                          
        </style>
        
    <?php endif ?>
    
    <body>  
        <?php if ($site->app_id): ?>
            
            <div id="fb-root"></div>
            <script>
              window.fbAsyncInit = function() {
                FB.init({
                  appId      : '<?php echo $site->app_id ?>', // App ID
                  status     : true, // check login status
                  cookie     : true, // enable cookies to allow the server to access the session
                  oauth      : true, // enable OAuth 2.0
                  xfbml      : true  // parse XFBML
                });
            
                FB.Canvas.setAutoGrow();
              };
            
              // Load the SDK Asynchronously
              (function(d){
                 var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                 js = d.createElement('script'); js.id = id; js.async = true;
                 js.src = "//connect.facebook.net/en_US/all.js";
                 d.getElementsByTagName('head')[0].appendChild(js);
               }(document));
            </script>        
        <?php endif ?>
            
        <?php if ($site->ga_code): ?>
            <script type="text/javascript">
                <?php echo $site->ga_code ?>
            </script>
         <?php endif ?> 