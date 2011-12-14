
<p>
    <a href="<?php echo base_url() ?>dashboard">&larr; Go back</a>
</p>
        


<fieldset>
    <?php if ($site): ?>
        <h3 style="margin-bottom:18px"><?php echo $site->name ?> images</h3>
    <?php endif ?>
    <div id="fileupload">
        <?php echo  form_open_multipart('game/upload_image/'.$this->uri->segment(3), array('id'=>'upload-image-form')) ?>
            <div class="fileupload-buttonbar">
                <label class="fileinput-button">
                    <span>Add files...</span>
                    <input type="file" name="userfile" multiple />
                </label>
                <button type="submit" class="start">Start upload</button>
                <button type="reset" class="cancel">Cancel upload</button>
                <button type="button" class="delete">Delete files</button>
            </div>
        <?php echo form_close(); ?>
        <div class="fileupload-content">
            <table class="files"></table>
            <div class="fileupload-progressbar"></div>
        </div>
    </div>
    <script id="template-upload" type="text/x-jquery-tmpl">
        <tr class="template-upload{{if error}} ui-state-error{{/if}}">
            <td class="preview"></td>
            <td class="name">${name}</td>
            <td class="size">${sizef}</td>
            {{if error}}
                <td class="error" colspan="2">Error:
                    {{if error === 'maxFileSize'}}File is too big
                    {{else error === 'minFileSize'}}File is too small
                    {{else error === 'acceptFileTypes'}}Filetype not allowed
                    {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                    {{else}}${error}
                    {{/if}}
                </td>
            {{else}}
                <td class="progress"><div></div></td>
                <td class="start"><button>Start</button></td>
            {{/if}}
            <td class="cancel"><button>Cancel</button></td>
        </tr>
    </script>            
    <script id="template-download" type="text/x-jquery-tmpl">
        <tr class="template-download{{if error}} ui-state-error{{/if}}">
            {{if error}}
                <td></td>
                <td class="name">${name}</td>
                <td class="size">${sizef}</td>
                <td class="error" colspan="2">Error:
                    {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                    {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                    {{else error === 3}}File was only partially uploaded
                    {{else error === 4}}No File was uploaded
                    {{else error === 5}}Missing a temporary folder
                    {{else error === 6}}Failed to write file to disk
                    {{else error === 7}}File upload stopped by extension
                    {{else error === 'maxFileSize'}}File is too big
                    {{else error === 'minFileSize'}}File is too small
                    {{else error === 'acceptFileTypes'}}Filetype not allowed
                    {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                    {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                    {{else error === 'emptyResult'}}Empty file upload result
                    {{else}}${error}
                    {{/if}}
                </td>
            {{else}}
                <td class="preview">
                    {{if thumbnail_url}}
                        <a href="${url}" class="dialog-image"><img width ="80"src="${thumbnail_url}"></a>
                    {{/if}}
                </td>
                <td class="name">
                    <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
                </td>
                <td class="size">${sizef}</td>
                <td colspan="2"></td>
            {{/if}}
            <td class="delete">
    	     <!-- <button data-type="${delete_type}" data-url="${delete_url}">Delete</button> -->
            </td>
        </tr>
    </script>
</fieldset>   

<div class = "alert-message block-message warning">
    After you uploaded the files, please <a href="" class="btn">Reload the page</a>
</div>
   

<?php if ($items): ?>
    
    <fieldset class = "sortable-wrapper">
        <?php echo form_open() ?>
        <ul id="image-sortable" class="media-grid span-16" style="padding-left:20px;">
            
          <?php foreach ($items as $i => $item): ?>
              <li class="sortable-item" id = "<?php echo $item->id ?>">
                  <span class="span3" style="width:290px;display:inline-block; text-align:center;">
                      <a href="#" style="margin-left:0px; max-width:280px; width:100%" class="media-a">
                          <span style="display:inline-block; max-width:280px; height:210px;">
                            <img src="<?php echo base_url() ?>uploads/thumbs/<?php echo $item->image ?>" alt="" class="thumbnail"/>
                          </span>
                      </a>
                  </span>
                  <?php if ($item->ga_category && $item->ga_action && $item->ga_label && $item->ga_value): ?>
                      <!-- 
                      <ul style="list-style-type:circle; margin-top:-15px;">
                          <li style="clear:both; display:list-item">
                              <strong>Category</strong>: <?php echo $item->ga_category ?> 
                          </li>
                          <li style="clear:both; display:list-item">
                              <strong>Action</strong>: <?php echo $item->ga_action ?> 
                          </li>
                          <li style="clear:both; display:list-item">
                              <strong>Value</strong>: <?php echo $item->ga_value ?>
                          </li>
                          <li style="clear:both; display:list-item">
                              <strong>Label</strong>: <?php echo $item->ga_label ?>
                          </li>
                      </ul>
                     -->
                  <?php endif ?>

                  <p class="item-nav">
                      <a rel = "dialog" title = "Analytics settings" href="<?php echo base_url() ?>image/analytics/<?php echo $item->id ?>">analytics
                        <?php if ($item->ga_category && $item->ga_action && $item->ga_label && $item->ga_value): ?>
                            ✔
                        <?php endif ?>
                      
                      </a>
                      <a href="<?php echo base_url() ?>game/delete_site_image/<?php echo $item->id ?>">delete</a>
                  </p>
              </li>
          <?php endforeach ?>
        </ul>
        <?php echo form_close() ?>
    </fieldset>  
<?php endif ?>
