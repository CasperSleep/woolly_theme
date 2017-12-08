<?php
namespace wol_highlighted_article\core;

use wol_highlighted_article\models\WOL_Highlight_Options;

class WOL_Highlighted_Core
{
    protected $meta_key_name = 'highlight_metabox';

    private $posts_options = [];

    public function __construct()
    {
        add_filter('post_class', [$this, 'add_post_highlight_class'], 10, 3);

        add_action('wol_post_highlight_options', [$this, 'display_post_highlight_attr'], 1, 2);

        add_filter('post_thumbnail_size', [$this, 'set_thumb_size']);
    }

    protected function get_highlight_options($post_id)
    {
        if (isset($this->posts_options[$post_id])) {
            return $this->posts_options[$post_id];
        }
        $options = get_post_meta($post_id, $this->meta_key_name, true);
        if (!($options instanceof WOL_Highlight_Options)) {
            $options = new WOL_Highlight_Options();
        }

        $this->posts_options[$post_id] = $options;
        return $options;
    }

    public function add_post_highlight_class($classes, $class, $post_id)
    {
        $options = $this->get_highlight_options($post_id);
        if($options->highlight) {
            $classes[] = 'highlight-article';
        }

        return $classes;
    }

    public function display_post_highlight_attr($post_id, $flags=[])
    {
        $options = $this->get_highlight_options($post_id);
        if( isset($flags['highlight']) && $flags['highlight'] && !$options->highlight ) {
            return;
        }
        if($options->color) {
            echo 'style="background-color: ' . $options->color . '"';
        }
    }

    public function set_thumb_size($size)
    {
        if( !is_singular('post')) {

            $post = get_post();
            if ($post instanceof \WP_Post) {
                $options = $this->get_highlight_options($post->ID);
                if ($options->highlight) {
                    $size = 'w700';
                }
            }
        }

        return $size;
    }
}