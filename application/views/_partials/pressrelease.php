<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>
<?php if (!$item): ?>
    <div class="alert alret-error">
        No press release found :(
    </div>
<?php else: ?>
    <div class="preview">
        <h2 style="padding:10px;">
            <?php if ($item && isset($item->title)): ?>
                <?php echo $item->title ?>
            <?php endif ?>
        </h2>
    
        <div class="row cols">
            <div class="span5 col center" id="general-info">
                <div class="span5 logo">
                    <img src="<?php echo $item->logo ? base_url() . 'uploads/original/'.$item->logo : 'http://placehold.it/175x175' ?>" alt="">
                </div>   
                <div class="span5 center">
                    <h3><?php echo $item->game_name ?></h3>         
                    <h5 style="margin-top:10px">Released <?php echo to_date($item->released) ?></h5>
                </div>
                <div  class="span5 center" style="margin-top:20px;">
                    <a class="btn orange large" href = "#">Download press pack</a>
                    <p>
                        <span class="help-block">
                            Size: ~18MB
                        </span>                
                    </p>
                </div>
                <div class="span5 ">
                    <div class="left">
                        <?php if (trim($item->pack_description)): ?>
                            <?php echo $item->pack_description ?>
                        <?php else: ?>
                            <p>The press pack contains:</p>
                            <ul>
                                <li>High resolution artwork and screenshots</li>
                                <li>Press release</li>
                                <li>YouTube video embed code </li>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="span7 col">
                <div>
                    <div class="span7" style="margin:10px auto;text-align:center">
                        <?php if ($item->video): ?>
                            <?php echo embed_youtube($item->video) ?>
                        <?php else: ?>
                            <img src="http://placehold.it/520x305" alt="" style="margin: 0 auto;">
                        <?php endif ?>
                    </div>
                    <div class="span7" style="margin:5px auto">
                        <textarea rows="2" class = "input-xxlarge copy-code" style="margin: 0 auto;"><?php echo $item->video ? embed_youtube($item->video) : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row available">
            <div class="span12 col <?php echo !$item->stores ? 'missing' : '' ?>">
                <div class="span3">
                    <h2>Available on:</h2>
                </div>
                <div class="span9 store-item" style="margin-left:0">
                    <?php if ($item->stores): ?>
                        <?php foreach ($item->stores as $store): ?>
                            <div class="row ">
                                <div class="span2">
                                    <a rel = "twipsy" title = "<?php echo $store->name ?>"  href="<?php echo $store->url ?>" target = "_blank">
                                        <img src="<?php echo base_url() ?>uploads/original/<?php echo $store->image ?>" alt="">
                                    </a>                                
                                </div>
                                <div class="span7">
                                    <input type="text" class = "input-xxlarge copy-code" value = "<?php echo $store->url ?>">
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>        
        </div>
        
        <div class="row press">
            <div class="span5">
                <div>
                    <?php if ($item->header_col1): ?>
                        <?php echo $item->header_col1 ?>
                    <?php else: ?>
                        <p>
                            PRESS RELEASE
                        </p>
                        <p>
                            <?php echo to_date($item->released) ?>
                        </p>
                        <p>
                            For Immediate Release                 
                        </p>
                        <p>
                            Title: <strong><?php echo $item->game_name ?></strong>
                        </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="span6" style="width:535px;">
                <div>
                    <?php if ($item->header_col2): ?>
                        <?php echo $item->header_col2 ?>
                    <?php else: ?>
                        <p>
                            FORMAT:
                        </p>
                        <p>
                            RELEASE:<?php echo to_date($item->released) ?>
                        </p>
                        <p>
                            DEVELOPER: Invictus
                        </p>
                        <p>
                            PUBLISHER: Invictus
                        </p>
                        <p>
                            INVICTUS WEBSITE: <a href="http://www.invictus.com" target = "_blank" data-ga = "1" data-ga-category="Internal link" data-ga-action="click" data-ga-label="Press - Greed Corp Phone - Greed Corp InvictusCom Top" data-ga-value="1">www.invictus.com</a>
                        </p>
                    <?php endif ?>
                </div>
            </div>
        </div>
        
        <div class="press-release-text">
            <div>
                <?php if ($item->description): ?>
                    <?php echo $item->description ?>
                <?php else: ?>
        
                    <p>
                       <strong>About Invictus Games Ltd: </strong>
                    </p>
                    <p>
                        Invictus Games Ltd is Hungary’s premier video game development studio, with a wealth of experience creating detailed racing games. Invictus' more than 10 year track record developing racing games includes offline and online on iOS, Android and PC, for companies such as Codemasters, Activision, Disney and Gamepot. To learn more about Invictus games, please visit 
                        <a href="http://www.invictus.com" target = "_blank" data-ga = "1" data-ga-category="Internal link" data-ga-action="click" data-ga-label="Press - Greed Corp Phone - Greed Corp InvictusCom Bottom" data-ga-value="1">http://www.invictus.com</a>.
                    </p>
     
                <?php endif ?>
            </div>                 
        </div>
    </div>
<?php endif ?>
