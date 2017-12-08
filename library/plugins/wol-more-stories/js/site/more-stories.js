(function ($) {
    $(function () {
        var page = 2,
            ajaxLoad = false;
       $('#b_more_stories').on('click', function () {
           if(ajaxLoad) {
               return;
           }
           ajaxLoad = true;
           var form_data = new FormData();
           form_data.append('action', 'ajax_wol_more_stories');
           form_data.append('options[page]', page);

           if($(this).data('cat')) {
               form_data.append('options[category]', $(this).data('cat'));
           }
           if($(this).data('auth')) {
               form_data.append('options[author]', $(this).data('auth'));
           }

           var that = this;
           $.ajax({
               url: settingsAjax.ajaxurl,
               dataType: 'text',
               cache: false,
               contentType: false,
               processData: false,
               data: form_data,
               type: 'post',
               success: function( response ){
                   response = JSON.parse(response);
                   if( typeof response.data != 'undefined' ) {
                       $('.posts-block').append(response.data);
                       // self.oThickboxFAQPosts.find('.thickbox-response').html(response.data);
                       // self.oThickboxFAQPosts.on('click','.thickbox-response li', self.liSeleted );
                       page++;
                       if( typeof response.more != 'undefined' && ! response.more) {
                            $(that).closest('.load-more').remove();
                       }
                   } else{
                       // self.oThickboxFAQPosts.find('.thickbox-response').html('<span style="color: red;">Something were wrong. Try later.</span>');
                   }
                   ajaxLoad =false;
               },
               error: function() {
                   console.log('error');
                   ajaxLoad = false;
                   // self.oThickboxFAQPosts.find('.thickbox-response').html('<span style="color: red;">Something were wrong. Try later.</span>');
               }
           });
       });
    });
})(jQuery);