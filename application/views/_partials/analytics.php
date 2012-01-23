
<?php if (validation_errors()): ?>
    <div class="alert-message block-message error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

    <fieldset class="control-group">
        <label for="<?php echo $prefix ? $prefix : '' ?>ga_category">Category</label>
        <div class="controls">
            <input type="text" name = "<?php echo $prefix ? $prefix : '' ?>ga_category" id = "<?php echo $prefix ? $prefix : '' ?>ga_category" class = "input-xlarge" value = "<?php $prop = $prefix.'ga_category'; echo $_POST && isset($_POST[$prop]) ? $_POST[$prop] : ($item ? $item->$prop : '') ?>"/>
        </div>
    </fieldset>
    <fieldset class="control-group">
        <label for="<?php echo $prefix ? $prefix : '' ?>ga_action">Action</label>
        <div class="controls">
            <!-- <input type="text" name = "<?php echo $prefix ? $prefix : '' ?>ga_action" id = "<?php echo $prefix ? $prefix : '' ?>ga_action" class = "input-xlarge" value = "<?php $prop = $prefix.'ga_action';  echo $_POST && isset($_POST[$prop]) ? $_POST[$prop] : ($item ? $item->$prop : '') ?>"/> -->
            <?php $prop = $prefix.'ga_action';  echo form_dropdown($prefix.'ga_action', array('Click'=>'Click', 'Play'=>'Play'), $_POST && isset($_POST[$prop]) ? $_POST[$prop] : ($item ? $item->$prop : '')) ?>
        </div>
    </fieldset>
    <fieldset class="control-group">
        <label for="<?php echo $prefix ? $prefix : '' ?>ga_label">Label</label>
        <div class="controls">
            <input type="text" name = "<?php echo $prefix ? $prefix : '' ?>ga_label" id = "<?php echo $prefix ? $prefix : '' ?>ga_label" class = "input-xlarge" value = "<?php $prop = $prefix.'ga_label';  echo $_POST && isset($_POST[$prop]) ? $_POST[$prop] : ($item ? $item->$prop: '') ?>"/>
        </div>
    </fieldset>
    <fieldset class="control-group">
        <label for="<?php echo $prefix ? $prefix : '' ?>ga_value">Value</label>
        <div class="controls">
            <input type="text" name = "<?php echo $prefix ? $prefix : '' ?>ga_value" id = "<?php echo $prefix ? $prefix : '' ?>ga_value" class = "input-xlarge" value = "<?php $prop = $prefix.'ga_value';  echo $_POST && isset($_POST[$prop]) ? $_POST[$prop] : ($item && $item->$prop ? $item->$prop : '1') ?>"/>
        </div>
    </fieldset>
    <fieldset class="control-group">
        <label for="<?php echo $prefix ? $prefix : '' ?>ga_noninteraction">Non interaction</label>
        <div class="controls">
            <input type="checkbox" name = "<?php echo $prefix ? $prefix : '' ?>ga_noninteraction" id = "<?php echo $prefix ? $prefix : '' ?>ga_noninteraction" class = "input-xlarge" value = "<?php $prop = $prefix.'ga_noninteraction';  echo $_POST && isset($_POST[$prop]) ? 'checked="checked"' : ($item && $item->$prop ? 'checked="checked"' : '') ?>"/>
        </div>
    </fieldset>
