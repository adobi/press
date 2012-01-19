 
    
<?php echo form_open('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>
    <ul class="tabs nav">
        <li class="active"><a href="#general" data-toggle="tab">1. Store</a></li>
        <li><a href="#analytics" data-toggle="tab">2. Set up Google Analytics</a></li>
    </ul>       
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">
            <fieldset class="control-group">
                <label for="">Select a store</label>
                <div class="controls">
                    <input type="text" class = "input-xlarge" value = "" name="game_id">
                </div>
            </fieldset>            
            <fieldset class="control-group">
                <label for="">Link</label>
                <div class="controls">
                    <input type="text" class = "input-small datepicker" value = "" name="released">
                </div>
            </fieldset>
        </div>
        <div class="tab-pane fade" id="analytics">
            <?php echo $template['partials']['analytics'] ?>
        </div>
    </div>
    <fieldset class="form-actions">
        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn close-dialog" href="#">Cancel</a>
    </fieldset>
<?php echo form_close() ?>
