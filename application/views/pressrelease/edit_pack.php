 
    
<?php echo form_open_multipart('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>
    <ul class="tabs nav">
        <li class="active"><a href="#general" data-toggle="tab">1. Upload the pack</a></li>
        <li><a href="#analytics" data-toggle="tab">2. Set up Google Analytics</a></li>
    </ul>       
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">
            <fieldset class="control-group">
                <label for="">Press pack</label>
                <div class="controls">
                    <?php if ($item->pack): ?>
                        <p>
                            <a href="<?php echo base_url() ?>uploads/original/<?php echo $item->pack ?>" target="_blank"><?php echo $item->pack ?></a>
                            <a href="<?php echo base_url() ?>pressrelease/delete_pack" class="btn danger"><i class="trash"></i>delte</a>
                        </p>
                    <?php else: ?>
                        <div class="file-input-wrapper" style="top:5px; height:36px;">
                            <button class="btn info"><i class="file"></i>
                                select a file
                            </button>
                            <input type="file" id="upload-pack" name="pack"/>
                        </div>
                    <?php endif ?>
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
