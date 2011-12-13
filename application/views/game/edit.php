
<p>
    <a href="<?php echo base_url() ?>dashboard">&larr; Go back</a>
</p>
<fieldset>
    <legend>
        <?php if ($item): ?>
            <?php echo $item->name ?>
        <?php else: ?>
            New game
        <?php endif ?>
    </legend>
    <?php if (validation_errors()): ?>
        <div class="alert-message block-message error">
            <?php echo validation_errors() ?>
        </div>
    <?php endif ?>
    
    <?php echo  form_open_multipart('', array('id'=>'edit-game-form')) ?>
        <ul class="pills" data-pills="pills" style="margin-left:150px;">
            <li class="active"><a href="#game">Game</a></li>
            <li><a href="#analytics">Analytincs</a></li>
        </ul>
        <div class="pill-content">
            <div class="active" id="game">
                <div class="clearfix">
                    <label for="name">Name</label>
                    <div class="input">
                        <input type="text" name = "name" id = "name" class = "xxlarge" value = "<?php echo $item ? $item->name : '' ?>"/>
                    </div>
                </div>   
                <div class="clearfix">
                    <label for="url">Url</label>
                    <div class="input">
                        <input type="text" name = "url" id = "url" class = "xxlarge" value = "<?php echo $item ? $item->url : '' ?>"/>
                    </div>
                </div>
                <div class="clearfix">
                    <label for="description">Description</label>
                    <div class="input">
                        <textarea rows="6" name="description" id="redactor" class="xxlarge" style="width: 100%; height: 320px;"><?php echo $item ? $item->description : '' ?></textarea>
                    </div>
                </div>  
                <div class="clearfix">
                    <label for="released">Released</label>
                    <div class="input">
                        <input type="text" name = "released" id = "released" class = "small datepicker" value = "<?php echo $item ? to_date($item->released) : '' ?>"/>
                    </div>
                </div>                        
                <div class="clearfix">
                    <label for="logo">Logo</label>
                    <div class="input">
                        <?php if ($item && $item->logo): ?>
                            <div class="media-grid">
                                <a href="#" class="media-a">
                                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" alt="" class="thumbnail"/>
                                </a>
                            </div>
                            <p>
                                <a href="<?php echo base_url() ?>game/delete_file/<?php echo $item->id ?>/logo">delete image</a>
                            </p>
                        <?php else: ?>
                            <input type="file" name = "logo" value = "" />
                        <?php endif ?>
                    </div>
                </div>  
                <div class="clearfix">
                    <label for="pack">Pack</label>
                    <div class="input">
                        <?php if ($item && $item->pack): ?>
                            <input type="text" name = "pack" id = "pack" class = "large" value = "<?php echo $item ? $item->pack : '' ?>" disabled = "disabled"/>
                            <a href="<?php echo base_url() ?>game/delete_file/<?php echo $item->id ?>/pack">delete pack</a>
                            <a href="<?php echo base_url() ?>uploads/original/<?php echo $item->pack ?>" target = "_blank" style="margin-left:20px;font-weight:bold;">download pack &rarr;</a>
                        <?php else: ?>
                            <input type="file" name = "pack" value = "" />
                        <?php endif ?>
                    </div>
                </div>           
            </div>
            <div id="analytics">
                <div class="clearfix">
                    <label style="font-size:1.4em;padding-left:150px;text-align:left;"><strong>Name</strong></label>
                </div>                
                <div class="clearfix">
                    <label for="name_ga_category">Category</label>
                    <div class="input">
                        <?php echo form_dropdown('name_ga_category', array('outbound link'=>'outbound link', 'download'=>'download', 'video'=>'video', 'image'=>'image'), $item ? $item->name_ga_category : '') ?>
                    </div>
                </div>                  
                <div class="clearfix">
                    <label for="name_ga_action">Action</label>
                    <div class="input">
                        <?php echo form_dropdown('name_ga_action', array('click'=>'click', 'download'=>'download', 'play'=>'play', 'view'=>'view'), $item ? $item->name_ga_action : '') ?>
                    </div>
                </div>                  
                <div class="clearfix">
                    <label for="name_ga_label">Label</label>
                    <div class="input">
                        <input type="text" name = "name_ga_label" id = "name_ga_label" class = "xxlarge" value = "<?php echo $item ? $item->name_ga_label : '' ?>"/>
                    </div>
                </div>                  
                <div class="clearfix">
                    <label for="name_ga_value">Value</label>
                    <div class="input">
                        <input type="text" name = "name_ga_value" id = "name_ga_value" class = "xxlarge" value = "<?php echo $item && $item->name_ga_value ? $item->name_ga_value : '1' ?>"/>
                    </div>
                </div>  
                <div class="clearfix">
                    <label for="name_ga_noninteraction">Non interatction</label>
                    <div class="input" style="text-align:left">
                        <input type="checkbox" name = "name_ga_noninteraction" id = "name_ga_noninteraction" value = "1" <?php echo $item && $item->name_ga_noninteraction ? 'checked = "checked"' : '' ?>/>
                    </div>
                </div>                             

                <div class="clearfix">
                    <label style="font-size:1.4em;padding-left:150px;text-align:left;"><strong>Download</strong></label>
                </div>                
                <div class="clearfix">
                    <label for="down_ga_category">Category</label>
                    <div class="input">
                        <?php echo form_dropdown('down_ga_category', array('outbound link'=>'outbound link', 'download'=>'download', 'video'=>'video', 'image'=>'image'), $item ? $item->down_ga_category : '') ?>
                    </div>
                </div>                  
                <div class="clearfix">
                    <label for="down_ga_action">Action</label>
                    <div class="input">
                        <?php echo form_dropdown('down_ga_action', array('click'=>'click', 'download'=>'download', 'play'=>'play', 'view'=>'view'), $item ? $item->down_ga_action : '') ?>
                    </div>
                </div>                  
                <div class="clearfix">
                    <label for="down_ga_label">Label</label>
                    <div class="input">
                        <input type="text" name = "down_ga_label" id = "down_ga_label" class = "xxlarge" value = "<?php echo $item ? $item->down_ga_label : '' ?>"/>
                    </div>
                </div>                  
                <div class="clearfix">
                    <label for="name_ga_value">Value</label>
                    <div class="input">
                        <input type="text" name = "down_ga_value" id = "down_ga_value" class = "xxlarge" value = "<?php echo $item && $item->down_ga_value ? $item->down_ga_value : '1' ?>"/>
                    </div>
                </div>  
                <div class="clearfix">
                    <label for="down_ga_noninteraction">Non interatction</label>
                    <div class="input" style="text-align:left">
                        <input type="checkbox" name = "down_ga_noninteraction" id = "down_ga_noninteraction" value = "1" <?php echo $item && $item->down_ga_noninteraction ? 'checked = "checked"' : '' ?>/>
                    </div>
                </div> 
                               
            </div>
        </div>
        <div class="actions">
            <input type="submit" value="Save" class="btn primary"> &nbsp; <a class="btn" href="<?php echo base_url() ?>dashboard">Cancel</a>
        </div>        
        
    <?php echo form_close() ?>
</fieldset>
    