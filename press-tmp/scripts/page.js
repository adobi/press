(function($) {
	
	$(function() {
	    $('#fileupload').fileupload();
	    
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
        
        $('.pills').pills();
        if ($('#redactor').length)
            $('#redactor').redactor({ lang: 'en' });
	})
	
}) (jQuery);