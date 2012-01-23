
<p><a href="<?php echo base_url() ?>" class="btn primary"><i class="arrow-left"></i>Go back</a></p>

<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>
<?php if (!$item): ?>
    <div class="alert alret-error">
        No press release found
    </div>
<?php else: ?>
    <h2 class="round alert <?php echo $item->active ? 'alert-success' : 'alert-error' ?>" style="padding:10px; color:#222">
        <?php if ($item && isset($item->title)): ?>
            <?php echo $item->title ?> press release
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
                <a class="btn" href="<?php echo base_url() ?>press/<?php echo $item->url ? $item->url : $item->id ?>" target="_blank"><i class="zoom-in"></i>preview</a>
                <a href="<?php echo base_url() ?>pressrelease/delete/<?php echo $item ? $item->id : '' ?>" class="btn danger"><i class="trash"></i>delete</a>
            </p>
        <?php endif ?>
    </h2>

    <div class="row cols">
        <div class="span5 col center" id="general-info">
            <div class="span5 logo editable <?php echo $item->logo ? '' : 'missing' ?>" data-tooltip="tooltip" data-title="Step 1" data-content="Upload game logo" data-placement="top" data-trigger="manual">
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
            <div class="span5 editable <?php echo $item->title && $item->released ? '' : 'missing' ?>" data-tooltip="tooltip" data-title="Step 2" data-content="Select a game and set the release date" data-placement="right" data-trigger="manual">
                <h3><?php echo $item->title ?></h3>         
                <h5>Released <?php echo to_date($item->released) ?></h5>
                <p class="right item-nav">
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_game/" rel="dialog" title="Press release game settings"><i class="edit"></i>edit</a>
                </p>
            </div>
            <div  class="span5 editable <?php echo $item->pack ? '' : 'missing' ?>" data-tooltip="tooltip" data-title="Step 3" data-content="Upload the pack (may take several minutes)" data-placement="right" data-trigger="manual">
                <?php if ($item->pack): ?>
                    <a class="btn primary large" href = "<?php echo base_url() ?>uploads/original/<?php echo $item->pack ?>" target = "_blank">Download press pack</a>
                <?php else: ?>
                    <a class="btn primary large disabled" href = "#">Download press pack</a>
                <?php endif ?>
                
                <p>
                    <span class="help-block">
                        Size: ~ <?php echo $item->size ?> MB
                    </span>                
                </p>
                <div class="right item-nav">
                    <a href="<?php echo base_url() ?>pressrelease/edit_pack" class="btn" rel="dialog" title="Press release pack settings"><i class="edit"></i>edit</a>
                </div>
            </div>
            <div class="span5 editable <?php echo $item->pack_description ? '' : 'missing' ?>" data-tooltip="tooltip" data-title="Step 4" data-content="Edit the description of the pack" data-placement="right" data-trigger="manual">
                <div class="editable-text left">
                    <?php if (trim($item->pack_description)): ?>
                        <?php echo $item->pack_description ?>
                    <?php else: ?>
                        <?php echo @$defaults->pack_description ?>
                    <?php endif ?>
                </div>
                <p class="right item-nav">
                    <a href="<?php echo base_url() ?>pressrelease/edit_section/" class="btn" data-editable="edit" data-field="pack_description"><i class="edit"></i> edit</a>
                </p>
            </div>
        </div>
        <div class="span7 col">
            <div class="editable <?php echo $item->video ? '' : 'missing' ?>" data-tooltip="tooltip" data-title="Step 5" data-content="Add a video" data-placement="top" data-trigger="manual">
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
        <div class="span12 col <?php echo !$item->stores ? 'missing' : '' ?>" data-tooltip="tooltip" data-title="Step 6" data-content="Set the platforms and stores" data-placement="top" data-trigger="manual">
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
        <div class="span5 editable" data-tooltip="tooltip" data-title="Step 7" data-content="Add the game name and release date" data-placement="top" data-trigger="manual">
            <div class="editable-text">
                <?php if ($item->header_col1): ?>
                    <?php echo $item->header_col1 ?>
                <?php else: ?>
                    <?php echo @$defaults->header_col1 ?>
                <?php endif ?>
            </div>
            <p class="right item-nav">
                <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-field="header_col1"><i class="edit"></i> edit</a>
            </p>
        </div>
        <div class="span6 editable" style="width:535px;" data-tooltip="tooltip" data-title="Step 8" data-content="Add the platforms" data-placement="top" data-trigger="manual">
            <div class="editable-text">
                <?php if ($item->header_col2): ?>
                    <?php echo $item->header_col2 ?>
                <?php else: ?>
                    <?php echo @$defaults->header_col2 ?>
                <?php endif ?>
            </div>
            <p class="right item-nav">
                <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-field="header_col2"><i class="edit"></i> edit</a>
            </p>
        </div>
    </div>
    
    <div class="editable press-release-text" data-tooltip="tooltip" data-title="Step 9" data-content="Add the text of the press release" data-placement="top" data-trigger="manual">
        <div class="editable-text">
            <?php if ($item->description): ?>
                <?php echo $item->description ?>
            <?php else: ?>
                <?php echo @$defaults->description ?>
            <?php endif ?>
        </div>                 
        <p class="right item-nav">
            <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-editable-height="520" data-field="description"><i class="edit"></i> edit</a>
        </p> 
    </div>
<?php endif ?>
