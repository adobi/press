
<!-- 
<p>
    <a class="btn primary" href="<?= base_url(); ?>settings/edit">Create new</a>
</p>

<?php if ($items): ?>
    <?php foreach ($items as $item): ?>
        <fieldset class="control-group">
            <?php foreach ($item as $prop => $value): ?>
                <?php if ($prop !== 'id'): ?>
                    <p><label><strong><?php echo ucfirst($prop) ?> </label></strong><?php echo $value ?></p>
                <?php endif ?>
            <?php endforeach ?>
        </fieldset>
        <fieldset class="form-actions" style="text-align:right;">
            <a href="<?php echo base_url() ?>settings/edit/<?php echo $item->id ?>" class="btn primary"><i class="edit"></i>Edit</a>
            <a href="<?php echo base_url() ?>settings/delete/<?php echo $item->id ?>" class="btn danger"><i class="trash"></i>Delete</a>
        </fieldset>
    <?php endforeach ?>
<?php endif ?>

 -->
    <h2 style="margin-bottom:20px;">Default values</h2>
    
    <div class="tabbable tabs-left">
        
        <ul class="nav tabs">
            <li class="active"><a href="#pack-description" data-toggle="tab">Pack description</a></li>
            <li><a href="#section-1" data-toggle="tab">Section one</a></li>            
            <li><a href="#section-2" data-toggle="tab">Section two</a></li>            
            <li><a href="#description" data-toggle="tab">Description</a></li>            
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="pack-description">
                <?php echo form_open() ?>
                    <textarea name="" style="width:500px; height: 320px;" class="_redactor"></textarea>
                    <fieldset class="form-actions">
                        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn close-dialog" href="<?php echo base_url() ?>">Cancel</a>
                    </fieldset>                    
                <?php echo form_close() ?>
            </div>
            <div class="tab-pane" id="2">
                
            </div>
        </div>
    </div>