<!-- 
<p>
    <a href="<?php echo base_url() ?>/videos/<?php echo $item->site_id ?>">&larr; Go back</a>
</p>
 -->
<fieldset>
    <legend>Google Analytics</legend>
    <?php echo form_open() ?>

        <div class="clearfix">
            <label>Video</label>
            <div class="input">
                <?php echo embed_youtube($item->video) ?>
            </div>        
        </div>
        

        <?php echo $template['partials']['event_tracking'] ?>

        <div class="actions">
            <input type="submit" value="Save" class="btn primary"> &nbsp; <a class="btn close-dialog" href="#">Cancel</a>
        </div>       

    <?php echo form_close() ?>
</fieldset>