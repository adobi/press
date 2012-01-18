(function($) {
	
	$(function() {

	    
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            showMonthAfterYear:true,
            yearRange: '2010:+5'
        });	  	    
	    
	    //$('#fileupload').fileupload();
	    
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
	    
        /*
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
		*/
        $('body').delegate('a[rel*=dialog]', 'click', function() {
            
            $('.dialog').remove();
            
            var self = $(this);
            
            
            var elem = $('<div />', {'class': 'dialog', id: 'dialog_'+(new Date()).getTime(), title: self.attr('title')}).html('<p style = "text-align:center"><img src = "'+App.URL+'images/pie.gif" /></p>');
            
            elem.dialog({
                modal: false,
                width: 'auto',
                minWidth: 500,
                position:[Math.floor((window.innerWidth / 2)-150),  70],
                open: function(event, ui) {

                    //elem.html($('<img />', {src:self.attr('href')}));
                    elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                    $('.ui-dialog').css('top',  window.pageYOffset + 70);
                    //alert(window.innerHeight);

                    
                    $.get(self.attr('href'), function(response) {
                        elem.html(response);
                        
                        elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                        $('.ui-dialog').css('top',  window.pageYOffset + 70);
                        
                        
                        if ($('#redactor').length) {
                            $('#redactor').redactor({ lang: 'en', toolbar: 'mini' });
                        }
                    });
                    
                }
            });
            
            return false;
        });	
        
        $('body').delegate('.close-dialog', 'click', function() {
            
            $('.ui-dialog-titlebar-close').trigger('click');
            
            return false;
        }); 
        
        //$('.pills').pills();
        //$('.tabs').pills();
        
        if ($('#redactor').length) {
            $('#redactor').redactor({ lang: 'en', toolbar: 'mini' });
        }
            
        $(".fancybox").fancybox();
        
        $(".chosen").chosen({
            no_results_text: "No results matched", 
        }); 
        
        $('.chosen-select-all').bind('click', function(e) {
            e.preventDefault();
            
            var select = $(this).parents('div:first').find('.chosen');
            
            select.find('option').attr('selected', true);
            
            select.trigger("liszt:updated");
        });       
        $('.chosen-cancel-all').bind('click', function(e) {
            e.preventDefault();
            
            var select = $(this).parents('div:first').find('.chosen');
            
            select.find('option').removeAttr('selected');
            
            select.trigger("liszt:updated");
        });  
        
        //$('[id*=rumor_]').modal();
        
        //$('.new-rumor').parents('li:first').hover(function() { $('.new-rumor').css('opacity', 1) }, function() { $('.new-rumor').css('opacity', 0.25) })
        //$('.settings').parents('li:first').hover(function() { $('.settings').css('opacity', 1) }, function() { $('.settings').css('opacity', 0.25) })
        

        $('i.w').parents('li').hover(
			function() { $(this).find('i.w').css('opacity', 1); }, 
			function() { $(this).find('i.w').css('opacity', 0.25); }
		)
        
		$('.news-filter-options').bind('click', function() {
		    
		    var self = $(this), i = self.find('i'), klass = i.attr('class');
		    
		    self.parents('legend').nextAll('fieldset').toggle();
		    
		    if (/down/.test(klass)) {

		        i.removeClass('arrow-down').addClass('arrow-up');
		    }
		    else {
		        
    		    if (/up/.test(klass)) {
    		        i.removeClass('arrow-up').addClass('arrow-down');
    		    }
		    }

		    return false;
		});
		
        $("a[rel=popover]")
            .popover()
            .click(function(e) {
                e.preventDefault()
            });
        
        $('a[rel=twipsy]').tooltip();
                	
		prettyPrint() 
          
		
    
        $('body').delegate('.copy-code', 'click', function() {
            var self = $(this);
            
            self.select();
        });		
        
        $('body').delegate('[data-editable=edit]', 'click', function() {
            
            var self = $(this),
                elem = self.parents('.editable:first').find('.editable-text');
                html = elem.html(),
                
                h = (self.data('editable-height') !== undefined ? self.data('editable-height') : 220) + 'px';
                /*
                redactor = $('<textarea />', 
                {
                     name: '',
                     'class':"redactor",
                })
                .css({
                     width:"99%",
                     height: h,
                 })
                .val(html);
                */
                $.get(self.attr('href'), function(response) {
                    
                    elem.html(response);
                    
                    elem.find('.redactor')
                        .css('height', h)
                        .val(html)
                        .redactor({ lang: 'en', toolbar: 'mini' });
                });
            
            return false;
        });
        
        $('body').delegate('[data-editable=cancel]', 'click', function() {
            var self = $(this),
                html = self.parents('form:first').find('.redactor').val(),
                elem = self.parents('.editable:first').find('.editable-text');
            
            elem.html(html);
            
            return false;
        });
        
        $('body').delegate('form', 'submit', function() {
            $('#loading-global').show();
            
            return true;
        })

    });
	
}) (jQuery);