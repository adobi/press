
<?php if (validation_errors()): ?>
    <div class="alert-message block-message error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>
 
    <fieldset class="control-group">
        <label for="ga_category">Category</label>
        <div class="controls">
            <input type="text" name = "ga_category" id = "ga_category" class = "input-xlarge" value = "<?php echo $_POST && isset($_POST['ga_category']) ? $_POST['ga_category'] : ($item ? $item->ga_category : '') ?>"/>
        </div>
    </fieldset>
    <fieldset class="control-group">
        <label for="ga_action">Action</label>
        <div class="controls">
            <input type="text" name = "ga_action" id = "ga_action" class = "input-xlarge" value = "<?php echo $_POST && isset($_POST['ga_action']) ? $_POST['ga_action'] : ($item ? $item->ga_action : '') ?>"/>
        </div>
    </fieldset>
    <fieldset class="control-group">
        <label for="ga_label">Label</label>
        <div class="controls">
            <input type="text" name = "ga_label" id = "ga_label" class = "input-xlarge" value = "<?php echo $_POST && isset($_POST['ga_label']) ? $_POST['ga_label'] : ($item ? $item->ga_label : '') ?>"/>
        </div>
    </fieldset>
    <fieldset class="control-group">
        <label for="ga_value">Value</label>
        <div class="controls">
            <input type="text" name = "ga_value" id = "ga_value" class = "input-xlarge" value = "<?php echo $_POST && isset($_POST['ga_value']) ? $_POST['ga_value'] : ($item ? $item->ga_value : '1') ?>"/>
        </div>
    </fieldset>
    <fieldset class="control-group">
        <label for="ga_noninteraction">Non interaction</label>
        <div class="controls">
            <input type="checkbox" name = "ga_noninteraction" id = "ga_noninteraction" class = "input-xlarge" value = "<?php echo $_POST && isset($_POST['ga_noninteraction']) ? 'checked="checked"' : ($item && $item->ga_noninteraction ? 'checked="checked"' : '') ?>"/>
        </div>
    </fieldset>
