<?php
namespace wol_highlighted_article;

use wol_highlighted_article\core\WOL_Highlighted_Core;
use wol_highlighted_article\models\WOL_Highlight_Options;

class WOL_Admin extends WOL_Highlighted_Core
{

    private $wp_nonce_field_id = 'highlight_meta_box_nonce';
    private $wp_nonce_field_val = 'highlight_meta_box';

    public function __construct()
    {
        parent::__construct();

        add_action('admin_enqueue_scripts', array($this, 'load_scripts'));

        // Adding meta boxes.
        add_action('add_meta_boxes', array($this, 'add_highlight_metabox'));

        /**
         * hooking saving current post type
         * add_action( "save_post_{$post->post_type}", "callback function" );
         *
         * Wordpress use  do_action( "save_post_{$post->post_type}", $post_ID, $post, $update );
         */
        add_action('save_post_post', array($this, 'save_post_highlight_options'), 10, 1);
    }

    public function load_scripts($hook)
    {
        if (in_array($hook, ['post.php', 'post-new.php'])) {
            // Add the color picker css file
            wp_enqueue_style('wp-color-picker');

            wp_enqueue_script('wol-highlight', WOL_PLUGIN_URI . '/wol-highlighted-article/js/admin/highlight-article.js', array('jquery', 'wp-color-picker'), WOL_VERSION, true);
        }
    }

    public function add_highlight_metabox()
    {
        add_meta_box(
            $this->meta_key_name,
            esc_html__('Article Settings'),
            array($this, 'get_highlight_metabox'),
            'post',
            'side',
            'high'
        );
    }

    public function get_highlight_metabox($post)
    {
        $post = get_post($post);
        $options = $this->get_highlight_options($post->ID);

        wp_nonce_field($this->wp_nonce_field_val, $this->wp_nonce_field_id);
        wol_render_part_template(WOL_PLUGIN_PATH . '/wol-highlighted-article/templates/admin/highlight-metabox.php', [
            'metabox_name' => $this->meta_key_name,
            'options' => $options
        ]);
    }

    public function save_post_highlight_options($post_id)
    {
        /* Do not save autosaving data */
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        /* Check user ability */
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Verify nonce field.
        if (!isset($_POST[$this->wp_nonce_field_id]) || !wp_verify_nonce($_POST[$this->wp_nonce_field_id], $this->wp_nonce_field_val)) {
            return $post_id;
        }

        $options = new WOL_Highlight_Options($_POST[$this->meta_key_name]);
        if (!$options->is_empty()) {
            update_post_meta($post_id, $this->meta_key_name, $options);
        } else {
            delete_post_meta($post_id, $this->meta_key_name);
        }
    }
}
