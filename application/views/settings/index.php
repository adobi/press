
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
        
        <ul class="nav tabs settings-tabs" data-tooltip="tooltip" data-title="Page sections" data-content="Default values of the page sections <img src='<?php echo base_url() ?>images/layout-mini-help.png'>" data-placement="right" data-trigger="manual">
            <li class="active"><a href="#pack-description" data-toggle="tab">Pack description</a></li>
            <li><a href="#section-1" data-toggle="tab">Section one</a></li>            
            <li><a href="#section-2" data-toggle="tab">Section two</a></li>            
            <li><a href="#description" data-toggle="tab">Press release</a></li>            
        </ul>
        <div class="tab-content settings-tab-content">
            <div class="tab-pane active" id="pack-description">
                <h3>Pack description</h3>
                <?php echo form_open(base_url().'settings/edit#pack-description') ?>

                    <textarea name="pack_description" class="redactor"><?php echo @$item->pack_description ?></textarea>
                    <fieldset class="form-actions">
                        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>dashboard">Cancel</a>
                    </fieldset>                    
                <?php echo form_close() ?>
             </div>
            <div class="tab-pane" id="section-1">
                <h3>Section one</h3>
                <?php echo form_open(base_url().'settings/edit#section-1') ?>

                    <textarea name="header_col1"><?php echo @$item->header_col1 ?></textarea>
                    <fieldset class="form-actions">
                        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>dashboard">Cancel</a>
                    </fieldset>                    
                <?php echo form_close() ?>
            </div>
            <div class="tab-pane" id="section-2">
                <h3>Section two</h3>
                <?php echo form_open(base_url().'settings/edit#section-2') ?>

                    <textarea name="header_col2"><?php echo @$item->header_col2 ?></textarea>
                    <fieldset class="form-actions">
                        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>dashboard">Cancel</a>
                    </fieldset>                    
                <?php echo form_close() ?>
            </div>
            <div class="tab-pane" id="description">
               <h3>Press release</h3>
                <?php echo form_open(base_url().'settings/edit#description') ?>

                    <textarea name="description"><?php echo @$item->description ?></textarea>
                    <fieldset class="form-actions">
                        <button class="btn primary"><i class="ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>dashboard">Cancel</a>
                    </fieldset>                    
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    
    