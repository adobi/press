<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('embed_youtube')) {
	
		function embed_youtube($video, $autoplay = false) {
            
			return '<iframe width="450" height="340" src="http://www.youtube.com/embed/'.$video.($autoplay ? '/?autoplay=1&' : '/?') .'wmode=Opaque" frameborder="0" allowfullscreen></iframe>';
		}	
	}

?>