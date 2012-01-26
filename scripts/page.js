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
                
        		$(this).slideDown(100);
           })
           .ajaxStop(function() {
        		var self = $(this);
                self.html('Done!');
                
                setTimeout(function() {
                    self.slideUp( 100,
                        function() {
                            self.html('Working...');
                        }
                    );
                    
                }, 2000)
            });
            
        
        App.showNotification = function(message) 
        {
            var self = $('#loading-global');
            
            self.html(message).show();
    
            setTimeout(function() {
                self.hide();
                self.html('Working...');
    
            }, 4000)
            
        };	
                    
	    /*
        $('#fileupload').fileupload({
            done: function (e, data) {
                location.reload();
            }            
        });
        */
            
        $('body').delegate('a[rel*=dialog]', 'click', function() {
            
            $('.dialog').remove();
            
            var self = $(this);
            
            
            var elem = $('<div />', {'class': 'dialog', id: 'dialog_'+(new Date()).getTime(), title: self.attr('title')}).html('<p style = "text-align:center"><img src = "'+App.URL+'images/pie.gif" /></p>');
            elem.css({
                'min-width': '550px',
            });
            
            elem.dialog({
                modal: true,
                width: 'auto',
                position:[Math.floor((window.innerWidth / 2)-150),  70],
                open: function(event, ui) {

                    elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                    $('.ui-dialog').css('top',  window.pageYOffset + 70);
                    
                    $.get(self.attr('href'), function(response) {
                        elem.html(response);
                        elem.find('.tab-content').css('min-height', 250)
                        elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                        $('.ui-dialog').css('top',  window.pageYOffset + 70);
                        
                        /*
                        $('#fileupload').fileupload({
                            singleFileUploads: false,
                            acceptFileTypes:/(\.|\/)(gif|jpe?g|png|rar|zip)$/i,
                            done: function (e, data) {
                                console.log
                                location.reload();
                            },
                            fail: function(e, data) {
                                console.log(data.result);
                            }           
                        });
                        */
                        
                        
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
                        
                        //if ($(".chosen").length) {
                            
                            elem.find(".chosen").chosen({
                                no_results_text: "No results matched", 
                            }); 
                        //}
                        
                        $('input[type=file]').prettifyUpload();
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
        
        //$('[data-tooltip=tooltip]').popover('show');
        
		window.prettyPrint && prettyPrint();
    
        $('body').delegate('.copy-code', 'click', function() {
            var self = $(this);
            
            self.select();
        });	
        	
        var originalHtml = null;
        var isRedactorActive = false;
        $('body').delegate('[data-editable=edit]', 'click', function() {
            if (!isRedactorActive) {
            
                if ($(this).is('.editable')) {
                    var self = $(this).find('[data-editable=edit]'),
                        elem = $(this).find('.editable-text');
                } else {
                    var self = $(this),
                        elem = self.parents('.editable:first').find('.editable-text');
                }
                
                var html = elem.html(),
                
                h = (self.data('editable-height') !== undefined ? self.data('editable-height') : 220) + 'px';
    
                $.get(self.attr('href'), function(response) {
                    
                    if ($('.redactor').length) {
                        $.each($('.redactor'), function(i, v) {
                            $(v).parents('.editable-text').html(originalHtml);
                        });
                    }
                    
                    elem.html(response);
                    
                    originalHtml = html;
                    elem.find('.redactor')
                        .attr('name', self.data('field'))
                        .css('height', h)
                        .val(html)
                        .redactor({ lang: 'en', toolbar: 'mini' });
                    isRedactorActive = true;
                });
            } else {
                App.showNotification('Only one editor at a time')
            }
            return false;
        });
        
        $('body').delegate('[data-editable=cancel]', 'click', function() {
            var self = $(this),
                html = self.parents('form:first').find('.redactor').val(),
                elem = self.parents('.editable:first').find('.editable-text');
            
            elem.html(originalHtml);
            
            isRedactorActive = false;
            
            return false;
        });
        
        $('body').delegate('form', 'submit', function() {
            $('#loading-global').show();
            
            return true;
        });
        
        var redactor;
        if ($('.redactor').length) {
            redactor = $('.redactor').redactor({ lang: 'en', toolbar: 'mini' });
        }        
        $('.settings-tabs a[data-toggle="tab"]').on('shown', function (e) {
            e.target // activated tab
            e.relatedTarget // previous tab
            
            self = $(this);
            
            if (redactor) {
                
                redactor.destroy();
            }
            
            redactor = $('.tab-pane.active').find('textarea').redactor({ lang: 'en', toolbar: 'mini' });
        }); 
        
        var on = 0;
        $('.toggle-help').bind('click', function() {

            var elems = $('[data-tooltip=tooltip]')
                self = $(this);
            
            (elems.length
                ?
                ( (on = 1-on) ? $('.editable').css('opacity', 0.6) && elems.popover('show') : $('.editable').css('opacity', 1) && elems.popover('hide') ) 
                :
                ( (on = 1 - on) && $(this).data('tooltip', 'tooltip').data('title', 'No help on this page').data('placement', 'bottom').data('trigger', 'manual') ? self.popover('show') : self.popover('hide') )
            );

            
            return false;
        });
        
        /*
        $('body').delegate('input[type=file]', 'change', function() {
            var self = $(this);
            
            self.parents('.file-input-wrapper')
                .after($('<p />')
                    .html(self[0].files[0].name)
                    .append($('<a />', {href:'javascript:void(0)', 'class': 'btn danger'})
                        .html('<i class="trash"></i>remove')
                        .css('margin-left', '10px')
                        .bind('click', function() {
                            $(this).parent().remove();
                            
                            self[0].files = [];
                        })
                    )                    
                );
        }); 
        */
        $('body').delegate('#preview-video', 'click', function() {
            var code = $('#video-code').val();
            
            if ($.trim(code)) {
                $.getJSON(App.URL+'pressrelease/video/'+code, function(response) {
                    $('#video-preview').show();
                    $('#video-preview .youtube-iframe').html(response.response);
                })
            }
            
            return false;
        });
        
        
    });
	
}) (jQuery);