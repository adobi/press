<p>
    <a class="btn primary" href="<?= base_url(); ?>platform/edit">Create new</a>
</p>

<?php if ($items): ?>
    <div class="items row span12" style="margin-left:0px;">
        <?php foreach ($items as $item): ?>
            <div class="item span3">
                <div class="center">
                    <h5><?php echo $item->name ?></h5>
                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>" alt="">
                </div>
                <p class="right item-nav">
                    <a href="<?php echo base_url() ?>platform/edit/<?php echo $item->id ?>" class="btn primary"><i class="edit"></i>Edit</a>
                    <a href="<?php echo base_url() ?>platform/delete/<?php echo $item->id ?>" class="btn"><i class="trash"></i>Delete</a>
                </p>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>