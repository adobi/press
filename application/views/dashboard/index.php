
<h1 style="margin-bottom:20px;">Recent press releases</h1>
<div class="subnav">
    <ul class="nav nav-pills">
        <li><a class="subnav-a" href="#" style="cursor:text;color:#222;border-right:0px;"><strong>Filter </strong></a></li>
        <li><a class="subnav-a <?php echo $this->uri->segment(4) === 'type' && $this->uri->segment(5) === '2' ? ' active' : '' ?>" href="<?php echo base_url() ?>dashboard/index/0">All</a></li>
        <li><a class="subnav-a <?php echo $this->uri->segment(4) === 'type' && $this->uri->segment(5) === '2' ? ' active' : '' ?>" href="<?php echo base_url() ?>dashboard/index/<?php echo $this->uri->segment(3) ?>/type/2">Active</a></li>
        <li><a class="subnav-a  <?php echo $this->uri->segment(4) === 'type' && $this->uri->segment(5) === '1' ? ' active' : '' ?>" href="<?php echo base_url() ?>dashboard/index/<?php echo $this->uri->segment(3) ?>/type/1">Inactive</a></li>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="icon-align-justify"></i>Select a game<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <?php if ($press_games): ?>
                    <?php foreach ($press_games as $item): ?>
                        <li><a href="<?php echo base_url() ?>dashboard/index/<?php echo $this->uri->segment(3) ?>/game/<?php echo $item->id ?>"><?php echo $item->name ?></a></li>
                    <?php endforeach ?>
                <?php else: ?>
                    <li><a href="#"><em>No games</em></a></li>
                <?php endif ?>
            </ul>                
        </li>
    </ul>
</div>  
<?php if ($items): ?>
    
    <ul class="thumbnails" style="margin-top:20px;">
        <?php foreach ($items as $item): ?>
            <li class="span3 alert <?php echo $item->active === '1' ? 'alert-success' : 'alert-error' ?>">
                <div class="thumbnail">
                    <img class="press-logo" src="<?php echo $item->logo ? base_url() .'uploads/original/' . $item->logo : 'http://placehold.it/175x175' ?>" alt="">
                    <div class="caption">
                        <h5 class="center"><?php echo $item->title ? $item->title : '<small>No title</small>' ?></h5>
                        <h6 class="center"><?php echo $item->released ? to_date($item->released) : '<small>No release date</small>' ?></h6>
                        <div>
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-align-justify"></i>Select something <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php if ($item->active === '1'): ?>
                                            <a href="<?php echo base_url() ?>pressrelease/inactivate/<?php echo $item->id ?>"><i class="icon-retweet"></i>make inactive</a>
                                        <?php else: ?>
                                            <a href="<?php echo base_url() ?>pressrelease/activate/<?php echo $item->id ?>"><i class="icon-retweet"></i>make active</a>
                                        <?php endif ?>                                    
                                    </li>
    
                                    <li><a href="<?php echo base_url() ?>press/<?php echo $item->url ? $item->url : $item->id ?>" target="_blank"><i class="icon-zoom-in"></i>preview</a></li>
                                    <li><a href="<?php echo base_url() ?>pressrelease/edit/<?php echo $item->id ?>"><i class="icon-edit"></i>edit</a></li>
                                    <li><a href="<?php echo base_url() ?>pressrelease/delete/<?php echo $item->id ?>"><i class="icon-trash"></i>delete</a></li>
                                </ul>
                            </div>                            
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>    
    <?php echo $pagination_links ?>
<?php endif ?>
