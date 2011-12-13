<?php if ($items): ?>
<div class="content">
    <?php foreach ($items as $item): ?>
        <div class="span17 row item">
            <h3><a href="<?php echo base_url() ?>games/<?php echo $item->url ?>"  class="show-item"><?php echo $item->name ?></a></h3>
            <div class="item-container span17"></div>
        </div>
    <?php endforeach ?>
</div>
<?php endif ?>