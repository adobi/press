<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>    

    <ul class="tabs nav">
        <li class="active"><a href="#general" data-toggle="tab">1. Store</a></li>
        <li><a href="#analytics-store" data-toggle="tab">2. Set up Google Analytics</a></li>
    </ul> 
    
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">    
 
            <fieldset class="control-group">
                <label for="platform_id">Select a platform</label>
                <div class="controls">
                    <?php echo form_dropdown('platform_id', $platforms, $_POST && isset($_POST['platform_id']) ? $_POST['platform_id'] : ($item ? $item->platform_id : ''), 'class="chosen"') ?>
                </div>
            </fieldset>  
            <fieldset class="control-group">
                <label for="url">Url</label>
                <div class="controls">
                    <input type="text" name = "url" id = "url" class = "input-xlarge" value = "<?php echo $_POST && isset($_POST['url']) ? $_POST['url'] : ($item ? $item->url : '') ?>"/>
                </div>
            </fieldset>  
        </div>
        <div class="tab-pane fade" id="analytics-store">
            <?php echo $template['partials']['analytics'] ?>
        </div>  
    </div>   
    <fieldset class="form-actions">
        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn close-dialog" href="#">Cancel</a>
    </fieldset>    
<?php echo form_close() ?>
