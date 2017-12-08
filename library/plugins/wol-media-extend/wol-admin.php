<?php
namespace wol_media_extend;

class WOL_Admin
{
    public function __construct()
    {

        add_action('admin_enqueue_scripts', function () {
            wp_enqueue_media();
            wp_enqueue_script('media-extend', WOL_PLUGIN_URI . '/wol-media-extend/js/admin/media-extend.js', array(), WOL_VERSION, true);
        });
    }
}