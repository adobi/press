
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
            <label for="pack_description">Pack_description</label>
            <div class="controls">
                <textarea rows="5" name="pack_description" id = "pack_description" class="input-xxlarge"><?php echo $_POST && isset($_POST['pack_description']) ? $_POST['pack_description'] : ($item ? $item->pack_description : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="header_col1">Header_col1</label>
            <div class="controls">
                <textarea rows="5" name="header_col1" id = "header_col1" class="input-xxlarge"><?php echo $_POST && isset($_POST['header_col1']) ? $_POST['header_col1'] : ($item ? $item->header_col1 : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="header_col2">Header_col2</label>
            <div class="controls">
                <textarea rows="5" name="header_col2" id = "header_col2" class="input-xxlarge"><?php echo $_POST && isset($_POST['header_col2']) ? $_POST['header_col2'] : ($item ? $item->header_col2 : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="description">Description</label>
            <div class="controls">
                <textarea rows="5" name="description" id = "description" class="input-xxlarge"><?php echo $_POST && isset($_POST['description']) ? $_POST['description'] : ($item ? $item->description : '') ?></textarea>
            </div>
        </fieldset>      <fieldset class="form-actions">
        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>/<?php echo $this->uri->segment(1) ?>">Cancel</a>
    </fieldset>    
<?php echo form_close() ?>
