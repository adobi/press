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
	    
        $('body').delegate('a[rel*=dialog]', 'click', function() {
            
            $('.dialog').remove();
            
            var self = $(this);
            
            
            var elem = $('<div />', {'class': 'dialog', id: 'dialog_'+(new Date()).getTime(), title: self.attr('title')}).html('<p style = "text-align:center"><img src = "'+App.URL+'images/pie.gif" /></p>');
            elem.css('min-width', '450px')
            elem.dialog({
                modal: true,
                width: 'auto',
                position:[Math.floor((window.innerWidth / 2)-150),  70],
                open: function(event, ui) {

                    elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                    $('.ui-dialog').css('top',  window.pageYOffset + 70);
                    
                    $.get(self.attr('href'), function(response) {
                        elem.html(response);
                        
                        elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                        $('.ui-dialog').css('top',  window.pageYOffset + 70);
                        
                        
                        if ($('#redactor').length) {
                            $('#redactor').redactor({ lang: 'en', toolbar: 'mini' });
                        }
                        
                        if ($('.datepicker').length) {
                            $('.datepicker').datepicker({
                                dateFormat: 'yy-mm-dd',
                                changeYear: true,
                                changeMonth: true,
                                showMonthAfterYear:true,
                                yearRange: '2010:+5'
                            });	                            
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
        $('.tabs').tab();
        
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
                	
		window.prettyPrint && prettyPrint();
    
        $('body').delegate('.copy-code', 'click', function() {
            var self = $(this);
            
            self.select();
        });	
        	
        var originlHtml = null;
        $('body').delegate('[data-editable=edit]', 'click', function() {
            
            var self = $(this),
                elem = self.parents('.editable:first').find('.editable-text');
                html = originlHtml = elem.html(),
                
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
            
            elem.html(originlHtml);
            
            return false;
        });
        
        $('body').delegate('form', 'submit', function() {
            $('#loading-global').show();
            
            return true;
        })
        

    });
	
}) (jQuery);