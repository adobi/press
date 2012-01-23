<p>
    <a class="btn primary" href="<?= base_url(); ?>platform/edit"><i class="plus"></i>Create new</a>
</p>

<?php if ($items): ?>
    <ul class="thumbnails row span12" style="margin-left:0px;">
        <?php foreach ($items as $item): ?>
            <li class=" span3">
                <div class="thumbnail">
                    <img class="press-logo" src="<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>" alt="">
                    <div class="caption center">
                        <h6 style="margin: 10px 0"><?php echo $item->name ?></h6>
                        <a href="<?php echo base_url() ?>platform/edit/<?php echo $item->id ?>" class="btn primary"><i class="edit"></i>Edit</a>
                        <a href="<?php echo base_url() ?>platform/delete/<?php echo $item->id ?>" class="btn danger"><i class="trash"></i>Delete</a>
                    </p>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif ?>