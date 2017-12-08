<?php
namespace wol_more_stories;

class WOL_Site
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', [$this,'my_scripts_method'] );
    }

    public function my_scripts_method()
    {
        wp_enqueue_script( 'more-stories', WOL_PLUGIN_URI . '/wol-more-stories/js/site/more-stories.js', array('jquery'), WOL_VERSION);
        wp_localize_script('more-stories', 'settingsAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));
    }
}