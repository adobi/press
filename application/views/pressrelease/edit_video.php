 
    
<?php echo form_open('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>
    <ul class="tabs nav">
        <li class="active"><a href="#general" data-toggle="tab">1. Game</a></li>
        <li><a href="#analytics-video" data-toggle="tab">2. Set up Google Analytics video</a></li>
        <li><a href="#analytics-code" data-toggle="tab">3. Set up Google Analytics embed code</a></li>
    </ul>       
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">
            <fieldset class="control-group">
                <label for="">Video code</label>
                <div class="controls">
                    <input type="text" class = "input-xlarge" value = "" name="game_id">
                </div>
            </fieldset>            
        </div>
        <div class="tab-pane fade" id="analytics-video">
            <?php echo $template['partials']['analytics'] ?>
        </div>
        <div class="tab-pane fade" id="analytics-code">
            <?php echo $template['partials']['analytics'] ?>
        </div>
    </div>
    <fieldset class="form-actions">
        <button class="btn primary"><i class="ok"></i>Save</button><!-- &nbsp; <a class="btn" href="<?php echo base_url() ?>/<?php echo $this->uri->segment(1) ?>">Cancel</a> --> 
    </fieldset>
<?php echo form_close() ?>
