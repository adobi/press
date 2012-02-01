<p>

    <a class="btn " href="<?= base_url(); ?>platform/edit"><i class="icon-plus"></i>Create new</a>
</p>

<?php if ($items): ?>
    <ul class="thumbnails row span12" style="margin-left:-20px;">
        <?php foreach ($items as $item): ?>
            <li class=" span3">
                <div class="thumbnail">
                    <img class="press-logo" src="<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>" alt="">
                    <div class="caption center">
                        <h6 style="margin: 10px 0"><?php echo $item->name ?></h6>
                        <a href="<?php echo base_url() ?>platform/edit/<?php echo $item->id ?>" class="btn"><i class="icon-edit"></i>Edit</a>

                        <a href="<?php echo base_url() ?>platform/delete/<?php echo $item->id ?>" class="btn danger"><i class="icon-trash"></i>Delete</a>
                    </p>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif ?>
