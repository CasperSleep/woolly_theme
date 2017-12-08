jQuery(document).ready(function($){

    var add_image = 'Add',
        change_image = 'Change';

    var custom_uploader;

    $('.upload_image_button').live('click',function(e) {
        e.preventDefault();

        current = $(this);
        var container = current.closest('.img-container');

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            library: {
                type: 'image'
            },
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            container.find('.upload_image').val(attachment.url).trigger('change');
            container.find('.upload_image_id').val(attachment.id).trigger('change');
            var url = attachment.sizes.full.url;
            container.find('img').attr('src', url);
            container.find('a').attr('href', attachment.editLink);
            container.parent().addClass('image-exists');
            // container.find('.upload_image_button').text( container.find('.upload_image_button').data('change-image') || change_image );
        });

        //Open the uploader dialog
        custom_uploader.open();

    });

    // remove image on click
    $('.remove_image_button').live('click',function(e) {
        e.preventDefault();
        $(this).parent().find(".upload_image").val('');
        $(this).parent().find(".upload_image_id").val('');
        $(this).parent().find('img').attr('src', 'http://via.placeholder.com/200x125&text=image');
        $(this).parent().find('a').removeAttr('href');
        $(this).parent().parent().removeClass('image-exists');
        // $(this).parent().find('.upload_image_button').text( $(this).parent().find('.upload_image_button').data('add-image') || add_image );
    });


});
