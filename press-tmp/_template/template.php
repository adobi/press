<?php

    require_once 'header.php';
    
    if ($controller) {
        if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . $controller . '.php')) {
            require_once $controller ? $controller . '.php' : 'race-of-champions.php';
        } else {
            require_once '404.php';
        }
    } else {
        require_once 'race-of-champions.php';
    }
    
    
    require_once 'footer.php';