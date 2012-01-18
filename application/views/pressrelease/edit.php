
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
            <label for="game_id">Game_id</label>
            <div class="controls">
                <input type="text" name = "game_id" id = "game_id" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['game_id']) ? $_POST['game_id'] : ($item ? $item->game_id : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="released">Released</label>
            <div class="controls">
                <input type="text" name = "released" id = "released" class = "input-xxlarge datepicker" value = "<?php echo $_POST && isset($_POST['released']) ? $_POST['released'] : ($item ? $item->released : '') ?>"/>
            </div>
        </fieldset>        
        <fieldset class="control-group">
            <label for="logo">Logo</label>
            <div class="controls">
                <input type="text" name = "logo" id = "logo" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['logo']) ? $_POST['logo'] : ($item ? $item->logo : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="pack_description">Pack_description</label>
            <div class="controls">
                <textarea rows="5" name="pack_description" id = "pack_description" class="input-xxlarge"><?php echo $_POST && isset($_POST['pack_description']) ? $_POST['pack_description'] : ($item ? $item->pack_description : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="header_col2">Header_col2</label>
            <div class="controls">
                <textarea rows="5" name="header_col2" id = "header_col2" class="input-xxlarge"><?php echo $_POST && isset($_POST['header_col2']) ? $_POST['header_col2'] : ($item ? $item->header_col2 : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="header_col1">Header_col1</label>
            <div class="controls">
                <textarea rows="5" name="header_col1" id = "header_col1" class="input-xxlarge"><?php echo $_POST && isset($_POST['header_col1']) ? $_POST['header_col1'] : ($item ? $item->header_col1 : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="description">Description</label>
            <div class="controls">
                <textarea rows="5" name="description" id = "description" class="input-xxlarge"><?php echo $_POST && isset($_POST['description']) ? $_POST['description'] : ($item ? $item->description : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="title_ga_category">Title_ga_category</label>
            <div class="controls">
                <input type="text" name = "title_ga_category" id = "title_ga_category" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['title_ga_category']) ? $_POST['title_ga_category'] : ($item ? $item->title_ga_category : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="title_ga_action">Title_ga_action</label>
            <div class="controls">
                <input type="text" name = "title_ga_action" id = "title_ga_action" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['title_ga_action']) ? $_POST['title_ga_action'] : ($item ? $item->title_ga_action : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="title_ga_label">Title_ga_label</label>
            <div class="controls">
                <input type="text" name = "title_ga_label" id = "title_ga_label" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['title_ga_label']) ? $_POST['title_ga_label'] : ($item ? $item->title_ga_label : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="title_ga_value">Title_ga_value</label>
            <div class="controls">
                <input type="text" name = "title_ga_value" id = "title_ga_value" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['title_ga_value']) ? $_POST['title_ga_value'] : ($item ? $item->title_ga_value : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="title_ga_noninteraction">Title_ga_noninteraction</label>
            <div class="controls">
                <input type="text" name = "title_ga_noninteraction" id = "title_ga_noninteraction" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['title_ga_noninteraction']) ? $_POST['title_ga_noninteraction'] : ($item ? $item->title_ga_noninteraction : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="pack_ga_category">Pack_ga_category</label>
            <div class="controls">
                <input type="text" name = "pack_ga_category" id = "pack_ga_category" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['pack_ga_category']) ? $_POST['pack_ga_category'] : ($item ? $item->pack_ga_category : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="pack_ga_action">Pack_ga_action</label>
            <div class="controls">
                <input type="text" name = "pack_ga_action" id = "pack_ga_action" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['pack_ga_action']) ? $_POST['pack_ga_action'] : ($item ? $item->pack_ga_action : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="pack_ga_label">Pack_ga_label</label>
            <div class="controls">
                <input type="text" name = "pack_ga_label" id = "pack_ga_label" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['pack_ga_label']) ? $_POST['pack_ga_label'] : ($item ? $item->pack_ga_label : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="pack_ga_value">Pack_ga_value</label>
            <div class="controls">
                <input type="text" name = "pack_ga_value" id = "pack_ga_value" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['pack_ga_value']) ? $_POST['pack_ga_value'] : ($item ? $item->pack_ga_value : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label for="pack_ga_noninteraction">Pack_ga_noninteraction</label>
            <div class="controls">
                <input type="text" name = "pack_ga_noninteraction" id = "pack_ga_noninteraction" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['pack_ga_noninteraction']) ? $_POST['pack_ga_noninteraction'] : ($item ? $item->pack_ga_noninteraction : '') ?>"/>
            </div>
        </fieldset>      <fieldset class="form-actions">
        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>/<?php echo $this->uri->segment(1) ?>">Cancel</a>
    </fieldset>    
<?php echo form_close() ?>
