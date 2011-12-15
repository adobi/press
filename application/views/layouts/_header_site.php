<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" 
    <?php if ($_SERVER['HTTP_HOST'] !== 'localhost'): ?>
        style="overflow: hidden"
    <?php endif ?>
>
    <head>
    	<title>Press</title>
        <meta charset="utf-8">
        
        <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.min.css" media="all" />
        <link rel = "stylesheet" href="<?= base_url() ?>css/site.css" media="all" />
        
        <script src = "http://code.jquery.com/jquery-1.7.min.js"></script>
        <script type="text/javascript">
            BASE_URL = "<?php echo base_url() ?>";
        </script>
        
    </head>
    
    <body>  
    
        <div class="container" id="top">