        <div class="span16">
            
        	<div class="row three-col">
                <div class="span4 col" style="text-align:center;">
                    <div class="span4">
                        <a href="#">
                            <img src="<?php echo base_url() ?>uploads/original/<?php echo $site->logo ?>" alt="">
                        </a>
                    </div>
                    <h3>
                        <?php echo $site->name ?>
                    </h3>
                    <h6><?php echo to_date($site->released) ?></h6>
                    <h5>
                        <a href="#" class = "btn primary">Dowload the pack</a>
                    </h5>
                </div>
                <div class="span6 col">
                    <?php if (isset($images) && $images): ?>
                        <div id="image-slideshow" class="slideshow">
                	        <div class="slides_container span8">
                	            <?php foreach ($images as $item): ?>
    
                                    <div class="slide"  style="tex-talign:center;"
                                        data-ga-category = "<?php echo $item->ga_category ?>"
                                        data-ga-action = "<?php echo $item->ga_action ?>" 
                                        data-ga-label = "<?php echo $item->ga_label ?>" 
                                        data-ga-value = "<?php echo $item->ga_value ?>" 
                                        data-ga-noninteraction = "<?php echo $item->ga_noninteraction ?>"
                                        data-link = "<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>"
                                    >
                                        <!-- 
                                        <a rel = "fancybox" href="<?php echo base_url() ?>uploads/<?php echo $item->image ?>">
                                         -->
                                            <img src="<?php echo base_url() ?>uploads/<?php echo $item->image ?>" alt="" title = "" height="340"  class="max-width: 450px;">
                                        <!-- </a> -->
                                    </div>                                                              	            
                	            <?php endforeach ?>
                	        </div>
            	        </div> 
            	        
            	            <textarea rows="3" class = "span6 copy-code"><?php echo base_url() ?>uploads/original/<?php echo $images[0]->image ?></textarea>
            	        
                    <?php endif ?>
                </div>
                <div class="span6 col">
                    <?php if (isset($videos) && $videos): ?>
                        <div id="image-slideshow" class="slideshow">
                	        <div class="slides_container span8">
                	            <?php foreach ($videos as $item): ?>
    
                                   <div class="slide video-play" data-video-id = "<?php echo $item->video ?>"
                                        data-ga-category = "<?php echo $item->ga_category ?>"
                                        data-ga-action = "<?php echo $item->ga_action ?>" 
                                        data-ga-label = "<?php echo $item->ga_label ?>" 
                                        data-ga-value = "<?php echo $item->ga_value ?>" 
                                        data-ga-noninteraction = "<?php echo $item->ga_noninteraction ?>"
                                        data-link = '<?php echo embed_youtube($item->video) ?>'
                                    >
                                        <?php //echo htmlspecialchars_decode($item->video) ?>
                                        <?php echo youtube_video_image($item->video) ?>
                                    </div>                                                             	            
                	            <?php endforeach ?>
                	        </div>
            	        </div> 
            	        
            	        <textarea rows="3" class = "span6 copy-code"><?php echo embed_youtube($videos[0]->video) ?></textarea>
            	        
                    <?php endif ?>
                </div>
        	</div>
        </div>
	
            <div class="row" style="margin-top:20px;">
                <div class="span16 col">
                    <?php echo $site->description ?>
                </div>
                <div class="span16" style="margin-top:20px;text-align:center">
                    <a href="#" class = "btn close-item">Close</a>
                </div>
            </div>
          
