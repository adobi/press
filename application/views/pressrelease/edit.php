
<p><a href="<?php echo base_url() ?><?php echo $this->uri->segment(1) ?>" class="btn primary"><i class="arrow-left"></i>Go back</a></p>

<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

    <h2>
        <?php if ($item): ?>
            <?php echo $item->game_name ?>
        <?php else: ?>
                Create new press release
        <?php endif ?>
        <p class="pull-right"><a href="<?php echo base_url() ?>pressrelease/delete/<?php echo $item ? $item->id : '' ?>" class="btn danger"><i class="trash"></i>Delete</a></p>
    </h2>

    <div class="row cols">
        <div class="span5 col center" id="general-info">
            <div class="span5 logo editable">
                <img src="http://placehold.it/175x175" alt="">
                <div class="right item-nav ">
                    <?php echo form_open('', array('style'=>'margin-right:10px;')) ?>
                        <div class="file-input-wrapper">
                            <button class="btn info"><i class="picture"></i>
                                select an image
                            </button>
                            <input type="file" id="upload-logo" name="upload"/>
                        </div>
                        <button class="btn"><i class="upload"></i>upload</button>
                    <?php echo form_close() ?>
                </div>
            </div>   
            <div class="span5 editable">
                <h3>Greed Corp</h3>         
                <h5>Released 14 December 2011</h5>
                <p class="right item-nav">
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_analytics" rel="dialog" title="Press release - Google analytics settings" style="margin-right:0px;"><i class="cog"></i>analytics</a>
                    <a class="btn" href="#"><i class="edit"></i>edit</a>
                </p>
            </div>
            <div  class="span5 editable">
                <a class="btn primary large" href = "#">Download press pack</a>
                <p>
                    <span class="help-block">
                        Size: ~18MB
                    </span>                
                </p>
                <div class="right item-nav">
                    
                    <?php echo form_open('', array('style'=>'margin-right:10px;')) ?>
                        <div class="file-input-wrapper">
                            <button class="btn info"><i class="file"></i>
                                select a file
                            </button>
                            <input type="file" id="upload-logo" name="upload"/>
                        </div>
                        <button class="btn"><i class="upload"></i>upload</button>
                        <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_analytics" rel="dialog" title="Download link - Google analytics settings" style="margin-right:0px;"><i class="cog"></i>analytics</a>
                    <?php echo form_close() ?>
                </div>
            </div>
            <div class="span5 editable">
                <div class="editable-text left">
                    <p style="text-align:left; margin-left:30px;">The press pack contains:</p>
                    <ul style="text-align:left; margin-left:40px;">
                        <li>High resolution artwork and screenshots</li>
                        <li>Press release</li>
                        <li>YouTube video embed code </li>
                    </ul>
                </div>
                <p class="right item-nav">
                    <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit"><i class="edit"></i> edit</a>
                </p>
            </div>
        </div>
        <div class="span7 col">
            <div class="span7 editable" style="margin:10px auto;text-align:center">
                <img src="http://placehold.it/520x305" alt="" style="margin: 0 auto;">
                <p class="right item-nav">
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_analytics" rel="dialog" title="Video - Google analytics settings" style="margin-right:0px;"><i class="cog"></i>analytics</a>
                    <a class="btn" href="#"><i class="edit"></i>edit</a>
                </p>
            </div>
            <div class="span7 editable" style="margin:0 auto">
                <textarea rows="2" class = "input-xxlarge copy-code" style="margin: 0 auto;" disabled="disabled"><iframe width="530" height="315" src="http://www.youtube.com/embed/a2re02ob2RM" frameborder="0" allowfullscreen></iframe></textarea>
                <p class="right item-nav" style="margin-right:10px;">
                    <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_analytics" rel="dialog" title="Video code copy - Google analytics settings" style="margin-right:0px;"><i class="cog"></i>analytics</a>
                </p>
            </div>
        </div>
    </div>

    <div class="row available">
        <div class="span12 col">
            <div class="span3">
                <h2>Available on:</h2>
            </div>
            <div class="span9 store-item" style="margin-left:0">
                <div class="row editable">
                    <div class="span2">
                        <a rel = "twipsy" title = "iPod, iPhone"  href="http://itunes.apple.com/us/app/greed-corp/id484852980" target = "_blank">
                            <img src="<?php echo base_url() ?>images/app_store.png" alt="">
                        </a>                                
                    </div>
                    <div class="span7">
                        <input type="text" class = "input-xxlarge copy-code" value = "http://itunes.apple.com/us/app/greed-corp/id484852980">
                        <p class="item-nav right">
                            <a class="btn" href="<?php echo base_url() ?>pressrelease/edit_analytics" rel="dialog" title="Store - Google analytics settings" style="margin-right:0px;"><i class="cog"></i>analytics</a>
                            <a class="btn" href="#"><i class="edit"></i>edit</a>
                            <a class="btn" href="#"><i class="trash"></i>delete</a>
                        </p>
                    </div>
                </div>
                <p class="item-nav right" style="margin-top:10px;">
                    <a class="btn" href="#"><i class="plus"></i>add</a>
                </p>
            </div>
        </div>        
    </div>

    
    <div class="row press">
        <div class="span5 editable">
            <div class="editable-text">
                <p>
                    PRESS RELEASE
                </p>
                <p>
                    14 December 2011
                </p>
                <p>
                    For Immediate Release                 
                </p>
                <p>
                    Title: <strong>Greed Corp</strong>
                </p>
            </div>
            <p class="right item-nav">
                <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit"><i class="edit"></i> edit</a>
            </p>
        </div>
        <div class="span6 editable">
            <div class="editable-text">
                <p>
                    FORMAT: iOS, Android
                </p>
                <p>
                    RELEASE: December 2011
                </p>
                <p>
                    DEVELOPER: Invictus
                </p>
                <p>
                    PUBLISHER: Invictus
                </p>
                <p>
                    VANGUARD WEBSITE: <a href=" http://www.vanguardgames.net" target = "_blank" data-ga = "1" data-ga-category="Outbound link" data-ga-action="click" data-ga-label="Press - Greed Corp Phone - Greed Corp Vanguard Top" data-ga-value="1"> http://www.vanguardgames.net</a>
                </p>
                <p>
                    INVICTUS WEBSITE: <a href="http://www.invictus.com" target = "_blank" data-ga = "1" data-ga-category="Internal link" data-ga-action="click" data-ga-label="Press - Greed Corp Phone - Greed Corp InvictusCom Top" data-ga-value="1">www.invictus.com</a>
                </p>
            </div>
            <p class="right item-nav">
                <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit"><i class="edit"></i> edit</a>
            </p>
        </div>
    </div>
    
    <div class="editable press-release-text">
        <div class="editable-text">
            <h4 style="margin-bottom:20px;">
                Localized Greed Corp to hit iPhone and Android phone stores
            </h4>
            <p>
                <a href="http://bit.ly/greedcorp_yt2_pr" target = "_blank" data-ga="1" data-ga-category="Video - Trailers" data-ga-action="play" data-ga-label="Greed Corp trailer - Phones" data-ga-value = "1">Greed corp on iPhone and Android phones - Official trailer</a>
            </p>            
            <!-- 
            <p>
                Debrecen, Hungary. – 14 December 2011 
            </p>
             -->
            <p style="margin-top:20px;">
                After the release of Greed Corp HD on iPad, Android tablets and Mac in the beginning of November, Greed Corp fans no longer have to wait for being able to play the game on every type of devices: Invictus Games and Vanguard Games are bringing the turn-based strategy hit onto iPhone and Android mobile phones.
            </p>
            <p>
                Also, all content has been localized for the new release, and updates are being rolled out for the iPad and Android tablet versions accordingly. 
            </p>
            <p>
                The game will launch with a 40% special discount on iPhone and the iPad version will receive a special holiday discount of 40%.
            </p>

            <p style="margin-top:20px;">
               <strong>About Invictus Games Ltd: </strong>
            </p>
            <p>
                Invictus Games Ltd is Hungary’s premier video game development studio, with a wealth of experience creating detailed racing games. Invictus' more than 10 year track record developing racing games includes offline and online on iOS, Android and PC, for companies such as Codemasters, Activision, Disney and Gamepot. To learn more about Invictus games, please visit 
                <a href="http://www.invictus.com" target = "_blank" data-ga = "1" data-ga-category="Internal link" data-ga-action="click" data-ga-label="Press - Greed Corp Phone - Greed Corp InvictusCom Bottom" data-ga-value="1">http://www.invictus.com</a>.
            </p>
            <p style="margin-top:20px;">
                <strong>About Vanguard Games:</strong>
            </p>
            <p>
                Vanguard Games is a developer of downloadable online games for premium gaming platforms situated in Amsterdam. Vanguard is a merger of two studios and was founded in March 2010; its mission is to create new types of online games by combining the best elements of online gaming with the hallmarks of high-end console gaming. . To learn more about Vanguard Games, please visit 
                <a href="http://www.vanguardgames.net" target = "_blank" data-ga = "1" data-ga-category="Outbound link" data-ga-action="click" data-ga-label="Press - Greed Corp Phone - Greed Corp Vanguard Bottom" data-ga-value="1">http://www.vanguardgames.net</a>.
            </p>  
        </div>                 
        <p class="right item-nav">
            <a href="<?php echo base_url() ?>pressrelease/edit_section" class="btn" data-editable="edit" data-editable-height="520"><i class="edit"></i> edit</a>
        </p> 
    </div>