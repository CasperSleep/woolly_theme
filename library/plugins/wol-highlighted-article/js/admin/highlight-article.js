(function ($) {
    $('.color-picker').wpColorPicker({
        palettes: false,
        mode: 'hex',
        change: function( event, ui ) {
            // jQuery(this).val(jQuery(this).wpColorPicker('color'));
            // jQuery(this).closest(".wp-picker-container").find(".wp-color-result").attr('title', jQuery(this).wpColorPicker('color') );
        },
        clear: function( event, ui ) {
            // jQuery(this).closest(".wp-picker-container").find(".wp-color-result").attr('title', 'Select Color' );
        },
        palettes: ['#000', '#F9F5F9', '#F7FBFF', '#A1B0C3', '#F8F9F5', '#F5FFFB']
    });

    $('#post [name="post_title"]').change(function () {
        calcPostTitleLength($(this));
    });
    $('#post [name="post_title"]').keyup(function () {
        calcPostTitleLength($(this));
    });

    $(function () {
        $('#post [name="post_title"]').before($('<div id="post_title_length" style="color:#ff3f00"></div>'));
        calcPostTitleLength($('#post [name="post_title"]'));
    });

    function calcPostTitleLength($title) {
        var l = $title.val().length;
        var max = 54;
        if (max-l > 0) {
            $('#post_title_length').html('Left ' + (max-l) + ' characters otherwise the template may be broken.');
        } else {
            $('#post_title_length').html('Attention! The template may be broken. Title length more than ' + max + ' characters.');
        }
        $('#title-prompt-text').css('top','18px');
    }
})(jQuery);