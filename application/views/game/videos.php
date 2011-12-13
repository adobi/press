
<p>
    <a href="<?php echo base_url() ?>dashboard">&larr; Go back</a>
</p>

<fieldset>
    <?php if ($site): ?>
        <h3 style="margin-bottom:18px"><?php echo $site->name ?> videos</h3>
    <?php endif ?>
    <?php if (validation_errors()): ?>
        <div class="alert-message block-message error">
            <?php echo validation_errors() ?>
        </div>
    <?php endif ?>    
    <?php echo form_open('', array('id'=>'edit-video-form')) ?>
    
        <div class="clearfix">
            <label for="title">Title</label>
            <div class="input">
                <input type="text" name = "title" id = "title" class = "xxlarge" value = ""/>
            </div>
        </div>    
    
        <div class="clearfix">
            <label for="video">Youtube video id</label>
            <div class="input">
                <input type="text" name = "video" id = "video" class = "xxlarge" />
                <span class="help-block">http://www.youtube.com/watch?v=<strong>1P3MegpkaMI</strong></span>
                <!-- 
                <textarea rows="3" name="video" id="video" class="xxlarge"></textarea>
                
                 -->
            </div>
        </div>
            
        <div class="actions">
            <input type="submit" value="Save" class="btn primary"> &nbsp; <a class="btn" href="<?php echo base_url() ?>microsite">Cancel</a>
        </div>      
    <?php echo form_close() ?>
</fieldset>

<?php if ($items): ?>
    <fieldset id="video-items" class="sortable-wrapper" style="margin-left:0px; text-align:center">
        <?php echo form_open() ?>
            <ul id="video-sortable" style="margin:0px;">
            <?php foreach ($items as $item): ?>
                <li class="span8 sortable-item item " id="<?php echo $item->id ?>">
                    <h4 class = "title"><?php echo $item->title ?></h4>
                    <div class="video" style="margin-bottom:10px;" data-video-id = "<?php echo $item->video ?>"><?php echo embed_youtube($item->video) ?></div>
                    <p class="item-nav">
                        <a rel = "dialog" title = "Analytics settings" href="<?php echo base_url() ?>video/analytics/<?php echo $item->id ?>">
                            analytics
                            <?php if ($item->ga_category && $item->ga_action && $item->ga_label && $item->ga_value): ?>
                                ✔
                            <?php endif ?>
                        </a>
                        <a href="#" class="edit-video" data-id = "<?php echo $item->id ?>">edit</a>
                        <a href="<?php echo base_url() ?>microsite/delete_video/<?php echo $item->id ?>">delete</a>
                    </p>
                </li>
            <?php endforeach ?>
            </ul>
        <?php echo form_close() ?>
    </fieldset>
<?php endif ?>