<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php if (!$item): ?>
    <div class="alert alert-error">
        No press release found :(
    </div>
<?php else: ?>
    <div class="preview">

        <h2 style="padding:10px;">
            <?php if ($item && isset($item->title)): ?>
                <?php echo $item->title ?>
            <?php endif ?>
        </h2>
    
        <div class="row cols">
            <div class="span5 col center" id="general-info">
                <div class="span5 logo center">
                    <img src="<?php echo $item->logo ? base_url() . 'uploads/original/'.$item->logo : 'http://placehold.it/175x175' ?>" alt="">
                </div>   

                <div class="span5 center">
                    <h3><?php echo $item->title ? $item->title : '<small>No title</small>' ?></h3>         
                    <h5 style="margin-top:10px"><?php echo $item->released ? 'Released '.to_date($item->released) : '<small>No release date</small>'?></h5>
                </div>
                <div  class="span5 center" style="margin-top:20px;">
                    <a class="btn orange xxlarge download-button <?php echo $item->pack ? '' : 'disabled' ?>" href = "<?php echo $item->pack ? base_url() . 'uploads/original/'.$item->pack : '#' ?>"<?php echo event_tracking($item, 'pack') ?>>
                        <i class="download-large"></i> Download the pack
                    </a>
                    <p>
                        <?php if ($item->pack): ?>
                            <span class="help-block">
                                Size: ~<?php echo $item->size ?> MB
                            </span>                
                        <?php endif ?>
                    </p>
                </div>
                <div class="span5 ">
                    <div class="left">
                        <?php if (trim($item->pack_description)): ?>
                            <?php echo $item->pack_description ?>
                        <?php else: ?>
                            <?php echo @$defaults->pack_description ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="span7 col">
                    <div class="span7 press-video" style="margin:10px auto;text-align:center">
                        <?php if ($item->video): ?>
                            <?php echo embed_youtube($item->video) ?>
                        <?php else: ?>
                            <img src="http://placehold.it/520x305" alt="" style="margin: 0 auto;">
                        <?php endif ?>
                    </div>
                    <div class="span7 press-video-code center" style="margin:5px auto">

                        <textarea rows="2" class = "span6 copy-code" style="margin: 0 10px;"<?php echo event_tracking($item, 'video') ?>><?php echo $item->video ? embed_youtube($item->video) : '' ?></textarea>
                    </div>
            </div>
        </div>
    
        <div class="row available">
            <div class="span12 col <?php echo !$item->stores ? 'missing' : '' ?>">
                <div class="span3">
                    <h2>Available on:</h2>
                </div>
                <div class="span9 store-item" style="margin-left:0">
                    <?php if ($item->stores): ?>
                        <?php foreach ($item->stores as $store): ?>
                            <div class="row ">
                                <div class="span2">
                                    <a rel = "twipsy" title = "<?php echo $store->name ?>"  href="<?php echo $store->url ?>" target = "_blank">
                                        <img src="<?php echo base_url() ?>uploads/original/<?php echo $store->image ?>" alt="">
                                    </a>                                
                                </div>
                                <div class="span7">

                                    <input type="text" class = "span6 copy-code" value = "<?php echo $store->url ?>"<?php echo event_tracking($store) ?>>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>        
        </div>
        
        <div class="row press">
            <div class="span5 col-1">
                <div>
                    <?php if ($item->header_col1): ?>
                        <?php echo $item->header_col1 ?>
                    <?php else: ?>
                        <?php echo @$defaults->header_col1 ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="span6 col-2">
                <div>
                    <?php if ($item->header_col2): ?>
                        <?php echo $item->header_col2 ?>
                    <?php else: ?>
                        <?php echo @$defaults->header_col2 ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        
        <div class="press-release-text">
            <div>
                <?php if ($item->description): ?>
                    <?php echo $item->description ?>
                <?php else: ?>
                    <?php echo @$defaults->description ?>
                <?php endif ?>
            </div>                 
        </div>
    </div>
<?php endif ?>
