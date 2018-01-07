<?php
namespace wol_more_stories;

class WOL_Admin
{
    public function __construct()
    {
        // AJAX actions.
        //frontend ajax method needs to stand in admin area
        add_action( 'wp_ajax_ajax_wol_more_stories', array($this, 'ajax_wol_more_stories') );
        add_action( 'wp_ajax_nopriv_ajax_wol_more_stories', array($this, 'ajax_wol_more_stories') );

    }

    public function ajax_wol_more_stories()
    {
        $options = $_POST['options'];

        if (!is_array($options)) {
            //error
            echo json_encode([
              'data' => '',
              'more' => false
            ]);
            exit();
        }

        if( isset($options['tid']) ) {
            $options['tid'] = intval($options['tid']);
        }
        if (isset($options['author'])) {
            $options['author'] = intval($options['author']);
        }
        $post__not_in = apply_filters('wol_get_post_not_in_ids', []);

        $query = array(
            'paged' => $options['page'],
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => $post__not_in,
            'author' => $options['author'] ? $options['author'] : '',
        );

        if( isset($options['tax']) && $options['tax'] && $options['tid']) {
            switch ($options['tax']) {
                case 'category':
                    $query['cat'] = $options['tid'] ? $options['tid'] : '';
                    break;
                case 'post_tag':
                    $query['tag_id'] = $options['tid'] ? $options['tid'] : '';
                    break;
            }
        }

        wp($query);

        $data = '';
        while (have_posts()) {
            the_post();

            ob_start();
            // Include the single post content template.
            get_template_part( 'template-parts/content', get_post_format() );
            $data .= ob_get_clean();
        }

        echo json_encode([
            'data' => $data,
            'more' => $GLOBALS['wp_query']->found_posts > ($GLOBALS['wp_query']->post_count + ($options['page']-1)*get_option('posts_per_page',0)) ? true : false
        ]);
        exit();
    }
}