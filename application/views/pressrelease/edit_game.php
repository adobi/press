 
    
<?php echo form_open('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>
    <ul class="tabs nav">

        <li class="active"><a href="#general" data-toggle="tab">1. General information</a></li>
        <li><a href="#analytics" data-toggle="tab">2. Set up Google Analytics</a></li>
    </ul>       
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">
            <fieldset class="control-group">

                <label for="">Title</label>
                <div class="controls">
                    <input type="text" class = "input-xlarge" value = "<?php echo $item->title ?>" name="title">
                </div>
            </fieldset>
            <fieldset class="control-group">
                <label for="">Select a game</label>
                <div class="controls">
                    <?php echo form_dropdown('game_id', $games, $item && isset($item->game_id) ? $item->game_id : '', 'class="chosen"') ?>
                </div>
            </fieldset>            
            <fieldset class="control-group">
                <label for="">Released</label>
                <div class="controls">

                    <input type="text" class = "input-small datepicker" value = "<?php echo $item->released ? to_date($item->released) : '' ?> " name="released">
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
