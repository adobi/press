<!-- 
<p>
    <a href="<?php echo base_url() ?>microsite/images/<?php echo $item->site_id ?>">&larr; Go back</a>
</p>
 -->
<fieldset>
    <legend>Google Analytics</legend>
    <?php echo form_open() ?>

        <div class="clearfix">
            <label>Image</label>
            <div class="input">
                <img src="<?php echo base_url() ?>uploads/<?php echo $item->image ?>" alt=""  style="width:210px; height:150px; ">
            </div>        
        </div>
        

        <?php echo $template['partials']['event_tracking'] ?>

        <div class="actions">
            <input type="submit" value="Save" class="btn primary"> &nbsp; <a class="btn close-dialog" href="#">Cancel</a>
        </div>       

    <?php echo form_close() ?>
</fieldset>