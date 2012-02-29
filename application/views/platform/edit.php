
<p><a href="<?php echo base_url() ?><?php echo $this->uri->segment(1) ?>" class="btn primary"><i class="icon-arrow-left"></i>Go back</a></p>

<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>    
    <fieldset>
        <legend>
            <?php if ($item): ?>
                Edit
            <?php else: ?>
                New
            <?php endif ?>
        </legend>    
    </fieldset>
    <fieldset class="control-group">
        <label class="control-label" for="name">Name</label>
        <div class="controls">
            <input type="text" name = "name" id = "name" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['name']) ? $_POST['name'] : ($item ? $item->name : '') ?>"/>
        </div>
    </fieldset>  
 
    <fieldset class="control-group">
        <label class="control-label" for="image">Logo</label>
        <div class="controls">
            <?php if ($item && $item->image): ?>
               <ul class="thumbnails">
                    <li>
                        <a href="#" class="thumbnail">
                            <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>" alt=""/>
                        </a>
                    </li>
                </ul>
                <p>
                    <a class="btn" href="<?php echo base_url() ?>platform/delete_image/<?php echo $item->id ?>"><i class="icon-trash"></i>Delete image</a>
                </p>
            <?php else: ?>
                <input type="file" id="upload-logo" name="image"/>
            <?php endif ?>
        </div>
    </fieldset>      
    <fieldset class="form-actions">
        <button class="btn primary"><i class="icon-ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>/<?php echo $this->uri->segment(1) ?>">Cancel</a>
    </fieldset>    
<?php echo form_close() ?>
