<p>
    <a href="<?php echo base_url() ?>game/edit">Create new game</a>
</p>

<?php if ($items): ?>
    <fieldset class="span16">
        <?php foreach ($items as $item): ?>
            <div class="item row">
                <div class="span2">
                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" alt="" style="width:72px; height:72px;">
                </div>
                <div class="span13">
                    <h2><?php echo $item->name ?><span class="pull-right" style="color:#aaa; font-size:0.6em;text-transform:uppercase">Released: <?php echo to_date($item->released) ?></span></h2>
                    
                    <!-- <p><?php echo $item->description ?></p> -->
                    <p class="item-nav">
                        <a href="<?php echo base_url() ?>games/<?php echo $item->url ?>" target = "_blank"><strong>view site</strong></a>
                        <!-- 
                        <a href="<?php echo base_url() ?>uploads/original/<?php echo $item->pack ?>" target = "_blank">download pack</a>
                         -->
                        <a href="<?php echo base_url() ?>game/images/<?php echo $item->id ?>">images</a>
                        <a href="<?php echo base_url() ?>game/videos/<?php echo $item->id ?>">videos</a>
                        <a href="<?php echo base_url() ?>game/edit/<?php echo $item->id ?>">edit</a>
                        <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>">delete</a>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
    </fieldset>
<?php endif ?>