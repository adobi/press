
<p><a href="<?php echo base_url() ?>" class="btn primary"><i class="arrow-left"></i>Go back</a></p>

<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>
<?php if (!$item): ?>
    <div class="alert aret-error">
        No press release selected
    </div>
<?php else: ?>
    <h2 class="round alert <?php echo $item->active ? 'alert-success' : 'alert-error' ?>" style="padding:10px; color:#222">
        <?php if ($item && isset($item->game_name)): ?>
            <?php echo $item->game_name ?> press release
        <?php else: ?>
                Create new press release
        <?php endif ?>
        <?php if ($item): ?>
            
            <p class="pull-right">
                <?php if ($item->active): ?>
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/inactivate/<?php echo $item->id ?>"><i class="refresh"></i> make inactive</a>
                <?php else: ?>
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/activate/<?php echo $item->id ?>"><i class="refresh"></i> make active</a>
                <?php endif ?>
                <a class="btn" href="<?php echo base_url() ?>pressrelease/preview/<?php echo $item->id ?>"><i class="zoom-in"></i>preview</a>
                <a href="<?php echo base_url() ?>pressrelease/delete/<?php echo $item ? $item->id : '' ?>" class="btn danger"><i class="trash"></i>delete</a>
            </p>
        <?php endif ?>
    </h2>

    <div class="row cols">
        <div class="span5 col center" id="general-info">
            <div class="span5 logo editable <?php echo $item->logo ? '' : 'missing' ?>">
                <img src="<?php echo $item->logo ? base_url() . 'uploads/original/'.$item->logo : 'http://placehold.it/175x175' ?>" alt="">
                <div class="center item-nav ">
                    <?php if ($item->logo): ?>
                        <a class="btn" href="<?php echo base_url() ?>pressrelease/delete_image/<?php echo $item->id ?>"><i class="trash"></i>delete</a>
                    <?php else: ?>
                        <?php echo form_open_multipart('', array('style'=>'margin-right:10px;')) ?>
                            <div class="file-input-wrapper">
                                <button class="btn info"><i class="picture"></i>
                                    select an image
                                </button>
                                <input type="file" id="upload-logo" name="logo"/>
                            </div>
                            <button class="btn"><i class="upload"></i>upload</button>
                            <input type="hidden" name="upload_logo" value="1">
                        <?php echo form_close() ?>
                    <?php endif ?>
                </div>
            </div>   
            <div class="span5 editable <?php echo $item->game_name && $item->released ? '' : 'missing' ?>">
                <h3><?php echo $item->game_name ?></h3>         
                <h5>Released <?php echo to_date($item->released) ?></h5>
                <p class="right item-nav">
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_game/" rel="dialog" title="Press release game settings"><i class="edit"></i>edit</a>
                </p>
            </div>
            <div  class="span5 editable <?php echo $item->pack ? '' : 'missing' ?>">
                <a class="btn primary large" href = "#">Download press pack</a>
                <p>
                    <span class="help-block">
                        Size: ~18MB
                    </span>                
                </p>
                <div class="right item-nav">
                    <a href="<?php echo base_url() ?>pressrelease/edit_pack" class="btn" rel="dialog" title="Press release pack settings"><i class="edit"></i>edit</a>
                </div>
            </div>
            <div class="span5 editable <?php echo $item->pack_description ? '' : 'missing' ?>">
                <div class="editable-text left">
                    <?php if (trim($item->pack_description)): ?>
                        <?php echo $item->pack_description ?>
                    <?php else: ?>
                        <p>The press pack contains:</p>
                        <ul>
                            <li>High resolution artwork and screenshots</li>
                            <li>Press release</li>
                            <li>YouTube video embed code </li>
                        </ul>
                    <?php endif ?>
                </div>
                <p class="right item-nav">
                    <a href="<?php echo base_url() ?>pressrelease/edit_section/" class="btn" data-editable="edit" data-field="pack_description"><i class="edit"></i> edit</a>
                </p>
            </div>
        </div>
        <div class="span7 col">
            <div class="editable <?php echo $item->video ? '' : 'missing' ?>">
                <div class="span7" style="margin:10px auto;text-align:center">
                    <?php if ($item->video): ?>
                        <?php echo embed_youtube($item->video) ?>
                    <?php else: ?>
                            
                        <img src="http://placehold.it/520x305" alt="" style="margin: 0 auto;">
                    <?php endif ?>
                </div>
                <div class="span7" style="margin:5px auto">
                    <textarea rows="2" class = "input-xxlarge copy-code" style="margin: 0 auto;" disabled="disabled"><?php echo $item->video ? embed_youtube($item->video) : '' ?></textarea>
                    <!-- 
                    <p class="right item-nav" style="margin-right:10px;">
                        <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_analytics" rel="dialog" title="Video code copy - Google analytics settings" style="margin-right:0px;"><i class="cog"></i>analytics</a>
                    </p>
                     -->
                </div>
                <p class="right item-nav">
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_video" rel="dialog" title="Video settings"><i class="edit"></i>edit</a>
                </p>
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
                        <div class="row editable">
                            <div class="span2">
                                <a rel = "twipsy" title = "<?php echo $store->name ?>"  href="<?php echo $store->url ?>" target = "_blank">
                                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $store->image ?>" alt="">
                                </a>                                
                            </div>
                            <div class="span7">
                                <input type="text" class = "input-xxlarge copy-code" value = "<?php echo $store->url ?>">
                                <p class="item-nav right">
                                    <a class="btn" href="<?php echo base_url() ?>store/edit/<?php echo $store->id ?>" rel="dialog" title="Store settings"><i class="edit"></i>edit</a>
                                    <a class="btn" href="<?php echo base_url() ?>store/delete/<?php echo $store->id ?>"><i class="trash"></i>delete</a>
                                </p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
                <p class="item-nav right" style="margin-top:10px;">
                    <a class="btn" href="<?php echo base_url() ?>store/edit" rel="dialog" title="Store settings"><i class="plus"></i>add</a>
                </p>
            </div>
        </div>        
    </div>
    
    <div class="row press">
        <div class="span5 editable">
            <div class="editable-text">
                <?php if ($item->header_col1): ?>
                    <?php echo $item->header_col1 ?>
                <?php else: ?>
                    
                    <p>
                        PRESS RELEASE
                    </p>
                    <p>
                        <?php echo to_date($item->released) ?>
                    </p>
                    <p>
                        For Immediate Release                 
                    </p>
                    <p>
                        Title: <strong><?php echo $item->game_name ?></strong>
                    </p>
                <?php endif ?>
            </div>
            <p class="right item-nav">
                <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-field="header_col1"><i class="edit"></i> edit</a>
            </p>
        </div>
        <div class="span6 editable" style="width:535px;">
            <div class="editable-text">
                <?php if ($item->header_col2): ?>
                    <?php echo $item->header_col2 ?>
                <?php else: ?>
                    <p>
                        FORMAT:
                    </p>
                    <p>
                        RELEASE:<?php echo to_date($item->released) ?>
                    </p>
                    <p>
                        DEVELOPER: Invictus
                    </p>
                    <p>
                        PUBLISHER: Invictus
                    </p>
                    <p>
                        INVICTUS WEBSITE: <a href="http://www.invictus.com" target = "_blank" data-ga = "1" data-ga-category="Internal link" data-ga-action="click" data-ga-label="Press - Greed Corp Phone - Greed Corp InvictusCom Top" data-ga-value="1">www.invictus.com</a>
                    </p>
                <?php endif ?>
            </div>
            <p class="right item-nav">
                <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-field="header_col2"><i class="edit"></i> edit</a>
            </p>
        </div>
    </div>
    
    <div class="editable press-release-text">
        <div class="editable-text">
            <?php if ($item->description): ?>
                <?php echo $item->description ?>
            <?php else: ?>
    
                <p>
                   <strong>About Invictus Games Ltd: </strong>
                </p>
                <p>
                    Invictus Games Ltd is Hungary’s premier video game development studio, with a wealth of experience creating detailed racing games. Invictus' more than 10 year track record developing racing games includes offline and online on iOS, Android and PC, for companies such as Codemasters, Activision, Disney and Gamepot. To learn more about Invictus games, please visit 
                    <a href="http://www.invictus.com" target = "_blank" data-ga = "1" data-ga-category="Internal link" data-ga-action="click" data-ga-label="Press - Greed Corp Phone - Greed Corp InvictusCom Bottom" data-ga-value="1">http://www.invictus.com</a>.
                </p>
 
            <?php endif ?>
        </div>                 
        <p class="right item-nav">
            <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-editable-height="520" data-field="description"><i class="edit"></i> edit</a>
        </p> 
    </div>
<?php endif ?>
