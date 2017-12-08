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
})(jQuery);