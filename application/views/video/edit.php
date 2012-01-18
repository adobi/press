
<p><a href="<?php echo base_url() ?><?php echo $this->uri->segment(1) ?>" class="btn primary"><i class="arrow-left"></i>Go back</a></p>

<?php if (validation_errors()): ?>
    <div class="alert-message block-message error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>    

    <legend>
        <?php if ($item): ?>
            Edit
        <?php else: ?>
            New
        <?php endif ?>
    </legend>    
        <fieldset class="control-group">
            <label for="code">Code</label>
            <div class="controls">
                <textarea rows="5" name="code" id = "code" class="input-xxlarge"><?php echo $_POST && isset($_POST['code']) ? $_POST['code'] : ($item ? $item->code : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="ga_category">Ga_category</label>
            <div class="controls">
                <input type="text" name = "ga_category" id = "ga_category" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['ga_category']) ? $_POST['ga_category'] : ($item ? $item->ga_category : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="ga_action">Ga_action</label>
            <div class="controls">
                <input type="text" name = "ga_action" id = "ga_action" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['ga_action']) ? $_POST['ga_action'] : ($item ? $item->ga_action : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="ga_label">Ga_label</label>
            <div class="controls">
                <input type="text" name = "ga_label" id = "ga_label" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['ga_label']) ? $_POST['ga_label'] : ($item ? $item->ga_label : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="ga_value">Ga_value</label>
            <div class="controls">
                <input type="text" name = "ga_value" id = "ga_value" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['ga_value']) ? $_POST['ga_value'] : ($item ? $item->ga_value : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="ga_noninteraction">Ga_noninteraction</label>
            <div class="controls">
                <input type="text" name = "ga_noninteraction" id = "ga_noninteraction" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['ga_noninteraction']) ? $_POST['ga_noninteraction'] : ($item ? $item->ga_noninteraction : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="pressrelease_id">Pressrelease_id</label>
            <div class="controls">
                <input type="text" name = "pressrelease_id" id = "pressrelease_id" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['pressrelease_id']) ? $_POST['pressrelease_id'] : ($item ? $item->pressrelease_id : '') ?>"/>
            </div>
        </fieldset>      
        <fieldset class="form-actions">
            <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>/<?php echo $this->uri->segment(1) ?>">Cancel</a>
        </fieldset>    
<?php echo form_close() ?>
