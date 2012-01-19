
<?php if ($items): ?>
    <h1>Recent press releases</h1>
    <ul class="thumbnails" style="margin-top:20px;">
        <?php foreach ($items as $item): ?>
            
            <li class="span3 alert <?php echo $item->active === '1' ? 'alert-success' : 'alert-error' ?>">
                <div class="thumbnail">
                    <img class="press-logo" src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" alt="">
                    <div class="caption">
                        <h5 class="center"><?php echo $item->game_name ?></h5>
                        <h6 class="center"><?php echo to_date($item->released) ?></h6>
                        <p class="item-nav right">
                            <div class="btn-group" style="padding-left:20px;">
                                <a class="btn  large" data-toggle="dropdown" href="#">Select an option</a>
                                    <a class="btn  large dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php if ($item->active === '1'): ?>
                                            <a href="<?php echo base_url() ?>pressrelease/inactivate/<?php echo $item->id ?>"><i class="refresh"></i>make inactive</a>
                                        <?php else: ?>
                                            <a href="<?php echo base_url() ?>pressrelease/activate/<?php echo $item->id ?>"><i class="refresh"></i>make active</a>
                                        <?php endif ?>                                    
                                    </li>
                                    <li><a href="<?php echo base_url() ?>pressrelease/preview/<?php echo $item->id ?>"><i class="zoom-in"></i>preview</a></li>
                                    <li><a href="<?php echo base_url() ?>pressrelease/edit/<?php echo $item->id ?>"><i class="edit"></i>edit</a></li>
                                    <li><a href="<?php echo base_url() ?>pressrelease/delete/<?php echo $item->id ?>"><i class="trash"></i>delete</a></li>
                                </ul>
                            </div>                            
                        </p>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>    
    <?php echo $pagination_links ?>
<?php endif ?>
