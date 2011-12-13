(function($) {
	
	App = {
		
	    loader: function() {
            $("#ajax-loader").ajaxStart(function(){
                $(this).show();
            }).ajaxStop(function() {
                $(this).hide();
            });		
	    }
	};
	
	
	$(function() {
	    $('#fileupload').fileupload();
	    
	    $('body').delegate('.dialog-image', 'click', function() {
	        /*
	        var img = $('<img/>', {src: $(this).find('img').attr('src')});
	        //console.log('width:'+img.get(0).width+'px');
	        $('<div/>').append(img).dialog();
	        
	        $('.ui-dialog').css('width', img.get(0).width + 30);
	        */
	    }); 
	    
	    
	    if ($('#background_colorpicker').length) $('#background_colorpicker').farbtastic('#background_color');
	    
	    if ($('#font_colorpicker').length) $('#font_colorpicker').farbtastic('#font_color');
	    
	    if ($('#link_colorpicker').length) $('#link_colorpicker').farbtastic('#link_color');

	    if ($('#about_colorpicker').length) $('#about_colorpicker').farbtastic('#about_background_color');

	    if ($('#reviews_colorpicker').length) $('#reviews_colorpicker').farbtastic('#reviews_background_color');
	        
	    if ($('#stores_colorpicker').length) $('#stores_colorpicker').farbtastic('#stores_background_color');
	    
	    if ($('#section_title_colorpicker').length) $('#section_title_colorpicker').farbtastic('#section_title_color');
	    
	    if ($('#body_colorpicker').length) $('#body_colorpicker').farbtastic('#body_background_color');
	    
	    if ($('#bubble_border_colorpicker').length) $('#bubble_border_colorpicker').farbtastic('#bubble_border_color');
	    
	    if ($('#bubble_background_colorpicker').length) $('#bubble_background_colorpicker').farbtastic('#bubble_background_color');
	    
	    if ($('#bubble_colorpicker').length) $('#bubble_colorpicker').farbtastic('#bubble_color');
	    
	    if ($('#reviews_link_colorpicker').length) $('#reviews_link_colorpicker').farbtastic('#reviews_link_color');
	    
	    if ($('#reviews_press_colorpicker').length) $('#reviews_press_colorpicker').farbtastic('#reviews_press_color');
	    
	    if ($('#page_link_colorpicker').length) $('#page_link_colorpicker').farbtastic('#page_link_color');
	    
	    if ($('#page_active_colorpicker').length) $('#page_active_colorpicker').farbtastic('#page_active_color');
	    
	    if ($('#game_title_colorpicker').length) $('#game_title_colorpicker').farbtastic('#game_title_color');
	    
	    $('body').delegate('.edit-video', 'click', function() {
	        
	        var self = $(this), form = $('#edit-video-form'), item = self.parents('.item:first');
	        //console.log(form, item);
	        form.find('[name=title]').val(item.find('.title').html());
	        form.find('[name=video]').val(item.find('.video').attr('data-video-id'));
	        form.append($('<input />', {type: 'hidden', name: 'id', value: self.attr('data-id')}));
	        
	        $.scrollTo($('.container'));
	        
	        return false;
	    });

        $('#loading-global')
           .ajaxStart(function() {
                
        		$(this).show();
           })
           .ajaxStop(function() {
        		var self = $(this);
                self.html('Done!');
                
                setTimeout(function() {
                    self.html('Working...');
                    self.hide();
                }, 1500)
            });
	    
	    $('#rate-star').each(function(i, v) {
	        var self = $(v);
	        
	        self.raty({
	            path: App.URL + 'scripts/plugins/raty/img/',
	            start: self.attr('data-rate'),
	            scoreName: 'rate', 
            });
	    });
	    
	    $('.star').each(function(i, v) {
	        var self = $(v);
	        
	        self.raty({
	            path: App.URL + 'scripts/plugins/raty/img/',
	            start: self.attr('data-rate'), 
	            readOnly:true
            });
	    });
	    
	    $('.separator, .separator label').css('cursor', 'pointer');
	    $('.section-content').hide();
	    $('.section-content:first').show();
	    $('body').delegate('.separator', 'click', function() {
	        //$('.section-content').hide();
	        $(this).next('.section-content:first').toggle();
	    });
	    
			
        $('.separator').find('strong').wrap('<a href="javascript:;"></a>');
        $('.separator').find('strong').append('<span  style = " margin-left:2px;font-family:verdana;">»</span>');	    
	    
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            showMonthAfterYear:true,
            yearRange: '1980:+5'
        });	  
        
        $( "#image-sortable" ).sortable({
            //placeholder: "ui-state-highlight",
            stop: function(event, ui) {
                //console.log(event, ui);
                //console.log($('#sortable').sortable('toArray'));
                var name = $('.sortable-wrapper').find('[type=hidden]').attr('name'),
                    value = $('.sortable-wrapper').find('[type=hidden]').attr('value');
                
                var data = {};
                data['order'] = $('#image-sortable').sortable('toArray');
                data[name] = value;
                
                $.post(App.URL+"image/update_order", data, function() {});
            }
        });
		$( "#image-sortable" ).disableSelection();          

        $( "#store-sortable" ).sortable({
            //placeholder: "ui-state-highlight",
            stop: function(event, ui) {
                //console.log(event, ui);
                //console.log($('#sortable').sortable('toArray'));
                var name = $('.sortable-wrapper').find('[type=hidden]').attr('name'),
                    value = $('.sortable-wrapper').find('[type=hidden]').attr('value');
                
                var data = {};
                data['order'] = $('#store-sortable').sortable('toArray');
                data[name] = value;
                //console
                $.post(App.URL+"store/update_order", data, function() {});
            }
        });
		$( "#store-sortable" ).disableSelection();    


        $( "#video-sortable" ).sortable({
            //placeholder: "ui-state-highlight",
            stop: function(event, ui) {
                //console.log(event, ui);
                //console.log($('#sortable').sortable('toArray'));
                var name = $('.sortable-wrapper').find('[type=hidden]').attr('name'),
                    value = $('.sortable-wrapper').find('[type=hidden]').attr('value');
                
                var data = {};
                data['order'] = $('#video-sortable').sortable('toArray');
                data[name] = value;
                //console
                $.post(App.URL+"video/update_order", data, function() {});
            }
        });
		$( "#video-sortable" ).disableSelection();  
		
        $( "#review-sortable" ).sortable({
            //placeholder: "ui-state-highlight",
            stop: function(event, ui) {
                //console.log(event, ui);
                //console.log($('#sortable').sortable('toArray'));
                var name = $('.sortable-wrapper').find('[type=hidden]').attr('name'),
                    value = $('.sortable-wrapper').find('[type=hidden]').attr('value');
                
                var data = {};
                data['order'] = $('#review-sortable').sortable('toArray');
                data[name] = value;
                //console
                $.post(App.URL+"review/update_order", data, function() {});
            }
        });
		$( "#review-sortable" ).disableSelection(); 
		
        $('body').delegate('a[rel*=dialog]', 'click', function() {
            
            $('.dialog').remove();
            
            var self = $(this);
            
            
            var elem = $('<div />', {'class': 'dialog', id: 'dialog_'+(new Date()).getTime(), title: self.attr('title')}).html('<p style = "width: 300px;text-align:center"><img src = "'+App.URL+'images/pie.gif" /></p>');
    
            elem.dialog({
                modal: false,
                width: 'auto',
                minWidth: 500,
                position:[Math.floor((window.innerWidth / 2)-150),  70],
                open: function(event, ui) {
                    
                    $.get(self.attr('href'), function(response) {
                        elem.html(response);
                        //alert(window.innerHeight);
                        elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                        $('.ui-dialog').css('top',  window.pageYOffset + 70);
                        
                        
                        //elem.find('form p:last').append('<button class = "close-dialog">Mégsem</button>');
                    });
                    
                }
            });
            
            return false;
        });	
        
        $('body').delegate('.close-dialog', 'click', function() {
            
            $('.ui-dialog-titlebar-close').trigger('click');
            
            return false;
        });        
        /*
        $('#image-sortable').masonry({
            itemSelector : '.sortable-item',
        });        			     
        */
	})
	
}) (jQuery);