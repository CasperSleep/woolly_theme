(function($) {

    var button = null;

    $('.edit-pinned-item').on('click', function () {
        button = this;
        //open thickbox
        tb_click.call(this);

        //fill in thickbox
        var form_data = new FormData();
        form_data.append('action', 'ajax_add_edit_pinned_item');
        form_data.append('type', $(this).data('type'));
        $.ajax({
            url: ajaxurl,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function( response ){
                response = JSON.parse(response);
                if( typeof response.data != 'undefined' ) {
                    $('#thb-pinned-item .thb-content').html(response.data);
                } else {
                }
            },
            error: function() {
                console.log('error');
            }
        });


        return false;
    });

    $('.save-pinned-item').on('click', function () {
        var $form = $(this).closest('#thb-pinned-item').find('form');
        var form_data = new FormData($form.get(0));

        form_data.append('action', 'ajax_save_pinned_item');
        $.ajax({
            url: ajaxurl,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function( response ){
                response = JSON.parse(response);
                if( typeof response.data != 'undefined' ) {
                    console.log(response.data);
                    if( response.data !== false ) {
                        $(button).closest('td').find('.item-info').html(response.data.header);
                        $(button).closest('td').find('.pinned-img img').attr('src', (response.data.image_url || 'http://via.placeholder.com/200x125&text=image'));
                    }
                } else{

                }
                tb_remove();
            },
            error: function() {
                console.log('error');
            }
        });

        return false;
    });
})(jQuery);
