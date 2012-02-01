
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
    </h2>
    <div class="subnav" style="margin-bottom:20px;">
        <ul class="nav nav-pills">
            <li>
                <a href="<?php echo base_url() ?>dashboard/index/0"><i class="icon-arrow-left"></i>go back</a>
            </li>
            <?php if ($others): ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-align-justify"></i>select another release<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                            <?php foreach ($others as $p): ?>
                                <li><a href="<?php echo base_url() ?>pressrelease/edit/<?php echo $p->id ?>"><?php echo $p->title ? $p->title : '<em>No title ('.to_date($p->created).')</em>' ?></a></li>
                            <?php endforeach ?>
                    </ul>                
                </li>
            <?php endif ?>
            <?php if ($item): ?>
                <li>
                    <?php if ($item->active): ?>
                        <a href="<?php echo base_url() ?>pressrelease/inactivate/<?php echo $item->id ?>"><i class="icon-retweet"></i> make inactive</a>
                    <?php else: ?>
                        <a href="<?php echo base_url() ?>pressrelease/activate/<?php echo $item->id ?>"><i class="icon-retweet"></i> make active</a>
                    <?php endif ?>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>press/<?php echo $item->url ? $item->url : $item->id ?>" target="_blank"><i class="icon-zoom-in"></i>preview</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>pressrelease/delete/<?php echo $item ? $item->id : '' ?>"><i class="icon-trash"></i>delete</a>
                </li>
            <?php endif ?>
        </ul>
    </div>    
     <div class="row cols">
        <div class="span5 col center" id="general-info">
             
            <?php if ($this->upload->display_errors()): ?>
                 <div class="alert alert-error" style="margin:5px;">
                     <?php echo $this->upload->display_errors() ?>
                 </div>
             <?php endif ?>
            <div class="span5 logo editable <?php echo $item->logo ? '' : 'missing' ?>" data-tooltip="tooltip" data-title="Step 1" data-content="Upload game logo" data-placement="top" data-trigger="manual">
                <img src="<?php echo $item->logo ? base_url() . 'uploads/original/'.$item->logo : 'http://placehold.it/175x175' ?>" alt="">
                <div class="center item-nav ">
                    <?php if ($item->logo): ?>
                        <a class="btn btn-danger" href="<?php echo base_url() ?>pressrelease/delete_image/<?php echo $item->id ?>"><i class="icon-trash"></i>delete</a>
                    <?php else: ?>
                        <?php echo form_open_multipart('', array('style'=>'margin-right:10px;')) ?>
                            <input type="file" id="upload-logo" name="logo"/>
                            <input type="hidden" name="upload_logo" value="1">
                            <p><button class="btn"><i class="icon-upload"></i>upload</button></p>
                        <?php echo form_close() ?>
                    <?php endif ?>
                </div>
            </div>   
            <div class="span5 editable <?php echo $item->title && $item->released ? '' : 'missing' ?>" data-tooltip="tooltip" data-title="Step 2" data-content="Select a game and set the title and release date" data-placement="right" data-trigger="manual">
                <h3><?php echo $item->title ? $item->title : '<small>No title</small>' ?></h3>         
                <h5><?php echo $item->released ? 'Released ' . to_date($item->released) : '<small>No release date</small>' ?></h5>
                <p class="right item-nav">
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_game/" rel="dialog" title="Press release game settings"><i class="icon-edit"></i>edit</a>
                </p>
            </div>
            <div  class="span5 editable <?php echo $item->pack ? '' : 'missing' ?>" data-tooltip="tooltip" data-title="Step 3" data-content="Upload the pack (may take several minutes)" data-placement="right" data-trigger="manual">
                <?php if ($item->pack): ?>
                    <a class="btn btn-primary btn-large" href = "<?php echo base_url() ?>uploads/original/<?php echo $item->pack ?>" target = "_blank">Download press pack</a>
                <?php else: ?>
                    <a class="btn btn-primary btn-large disabled" href = "#">Download press pack</a>
                <?php endif ?>
                
                <p>
                    <span class="help-block">
                        Size: ~ <?php echo $item->size ?> MB
                    </span>                
                </p>
                <div class="right item-nav">
                    <a href="<?php echo base_url() ?>pressrelease/edit_pack" class="btn" rel="dialog" title="Press release pack settings"><i class="icon-edit"></i>edit</a>
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
                    <a href="<?php echo base_url() ?>pressrelease/edit_section/" class="btn" data-editable="edit" data-field="pack_description"><i class="icon-edit"></i> edit</a>
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
                <div class="span7 center" style="margin:5px auto">
                    <textarea rows="2" class = "input-xxlarge copy-code" style="margin: 0 10px;" disabled="disabled"><?php echo $item->video ? embed_youtube($item->video) : '' ?></textarea>
                </div>
                <p class="right item-nav">
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_video" rel="dialog" title="Video settings"><i class="icon-edit"></i>edit</a>
                </p>
            </div>
        </div>
                
    </div>

    <div class="row available">
        <div class="span12 col <?php echo !$item->stores ? 'missing' : '' ?>" data-tooltip="tooltip" data-title="Step 6" data-content="Set the platforms and stores" data-placement="bottom" data-trigger="manual">
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
                                    <a class="btn" href="<?php echo base_url() ?>store/edit/<?php echo $store->id ?>" rel="dialog" title="Store settings"><i class="icon-edit"></i>edit</a>
                                    <a class="btn danger" href="<?php echo base_url() ?>store/delete/<?php echo $store->id ?>"><i class="icon-trash"></i>delete</a>
                                </p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
                <p class="item-nav right" style="margin-top:10px;">
                    <a class="btn" href="<?php echo base_url() ?>store/edit" rel="dialog" title="Store settings"><i class="icon-plus"></i>add</a>
                </p>
            </div>
        </div>        
    </div>
    
    <div class="row press">
        <div class="span5 editable" data-tooltip="tooltip" data-title="Step 7" data-content="Add the game name and release date" data-placement="bottom" data-trigger="manual">
            <div class="editable-text">
                <?php if ($item->header_col1): ?>
                    <?php echo $item->header_col1 ?>
                <?php else: ?>
                    <?php echo @$defaults->header_col1 ?>
                <?php endif ?>
            </div>
            <p class="right item-nav">
                <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-field="header_col1"><i class="icon-edit"></i> edit</a>
            </p>
        </div>
        <div class="span6 editable" style="width:535px;" data-tooltip="tooltip" data-title="Step 8" data-content="Add the platforms" data-placement="bottom" data-trigger="manual">
            <div class="editable-text">
                <?php if ($item->header_col2): ?>
                    <?php echo $item->header_col2 ?>
                <?php else: ?>
                    <?php echo @$defaults->header_col2 ?>
                <?php endif ?>
            </div>
            <p class="right item-nav">
                <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-field="header_col2"><i class="icon-edit"></i> edit</a>
            </p>
        </div>
    </div>
    
    <div class="editable press-release-text" data-tooltip="tooltip" data-title="Step 9" data-content="Add the text of the press release" data-placement="bottom" data-trigger="manual">
        <div class="editable-text">
            <?php if ($item->description): ?>
                <?php echo $item->description ?>
            <?php else: ?>
                <?php echo @$defaults->description ?>
            <?php endif ?>
        </div>                 
        <p class="right item-nav">
            <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-editable-height="520" data-field="description"><i class="icon-edit"></i> edit</a>
        </p> 
    </div>
<?php endif ?>
