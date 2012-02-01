 
    
<?php echo form_open('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#general" data-toggle="tab">1. Video</a></li>
        <li><a href="#analytics-video" data-toggle="tab">2. Set up Google Analytics video</a></li>
        <li><a href="#analytics-code" data-toggle="tab">3. Set up Google Analytics embed code</a></li>
    </ul>       
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">
            <fieldset class="control-group">
                <label for="">Video code</label>
                <div class="controls">

                    <input type="text" class = "input-xlarge" value = "<?php echo $item && $item->video ? $item->video : '' ?>" name="video" id="video-code">
                    <a href="#" class="btn" id="preview-video"><i class="icon-film"></i>preview</a>
                    <p class="help-block"><code style="padding:5px;">http://www.youtube.com/watch?v=<strong style="color:#000;font-size:1.2em">VA770wpLX-Q</strong></code></p>
                    <div id="video-preview" style="margin-top:20px; display:none">
                        <div class="youtube-iframe"></div>
                        <p><a class="btn" href="#" onclick="$('#video-preview').hide(); $('#video-preview iframe').remove(); return false;">cancel</a></p>
                    </div>
                </div>
            </fieldset>            
            
        </div>
        <div class="tab-pane fade" id="analytics-video">
            <?php echo $template['partials']['analytics_video'] ?>
        </div>
        <div class="tab-pane fade" id="analytics-code">
            <?php echo $template['partials']['analytics_video_code'] ?>
        </div>
    </div>

    <fieldset class="form-actions">
        <button class="btn btn-primary"><i class="icon-ok"></i>Save</button> &nbsp; <a class="btn close-dialog" href="#">Cancel</a>
    </fieldset>
<?php echo form_close() ?>
