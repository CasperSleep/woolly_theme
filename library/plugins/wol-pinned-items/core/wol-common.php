<?php
namespace wol_pinned_items\core;

class WOL_Common
{
    //protected $_post_type = 'pinned_item';

    protected $options_prefix ='wol_pinned_item_';

    protected $pinned_types = [
        'top',
        'left',
        'right'
    ];

    protected $pinned_items = [];

    public function __construct()
    {
//        var_dump('434567890');
//        exit();
        // Register new custom post type.
//        add_action( 'init', array($this, 'register_post_type_pinned_item'), 0 );

        add_filter('wol_get_post_not_in_ids', [$this,'get_pinned_posts']);
    }

    public function register_post_type_pinned_item()
    {

        /**
         * Register new post type
         */
        register_post_type($this->_post_type, array(
            'labels' => array(
                'name' => __('Pinned Items'),
                'singular_name' => __('Pinned Item'),
                'add_new' => __('Add Item'),
                'add_new_item' => __('Add Item'),
                'edit' => __('Edit'),
                'edit_item' => __('Edit Item'),
                'new_item' => __('New Pinned Item'),
                'view' => __('View Pinned Items'),
                'view_item' => __('View Pinned Item'),
                'search_items' => __('Search Pinned Items'),
                'not_found' => __('No Item found'),
                'not_found_in_trash' => __('No Item found in Trash'),
                'parent' => __('Parent Item')
            ),
            'public' => false,
            'show_ui' => false,
            'menu_position' => 4,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'hierarchical' => false,
            'supports' => array('title'),
            'rewrite' => false,//array('slug' => self::PAGE_NAME, 'with_front' => false),
            'query_var' => true
        ));
    }

    public function save_pined_item($pinned_item)
    {
        if( in_array($pinned_item['type'], $this->pinned_types) ) {
            $type = $pinned_item['type'];
            unset($pinned_item['type']);
            foreach ($pinned_item as $k => $v) {
                if(!$v){
                    unset($pinned_item[$k]);
                }
            }
            return update_option($this->options_prefix . $type, $pinned_item);
        } else {
            return false;
        }
    }

    public function get_pinned_items()
    {
        if( empty($this->pinned_items) ) {
            foreach ($this->pinned_types as $type) {
                $this->pinned_items[$type] = get_option( $this->options_prefix . $type  , []  );
                if(isset($this->pinned_items[$type]['pinned_post']) && $this->pinned_items[$type]['pinned_post']) {
                    $this->pinned_items[$type]['wp_post'] = get_post($this->pinned_items[$type]['pinned_post']);
                }
            }
        }
        return $this->pinned_items;
    }

    public function get_pinned_item($type)
    {
        if( !in_array($type, $this->pinned_types)) {
            return false;
        }

        if( isset($this->pinned_items[$type])) {
            return $this->pinned_items[$type];
        }

        return get_option( $this->options_prefix . $type  , []  );
    }

    public function get_image_url($pinned_item, $size=false)
    {
        $url = '';
        if(isset($pinned_item['image']) && $pinned_item['image']) {
//            var_dump(wp_get_attachment_image_src($pinned_item['image'], 'w326h199'));
//            die;
            if( !$size) {
                $url = wp_get_attachment_url($pinned_item['image']);
            } else {
                $url = wp_get_attachment_image_src($pinned_item['image'], $size)[0];
            }
        }
        return $url;
    }

    public function get_pinned_posts()
    {
        $this->get_pinned_items();
        $pinned_posts = [];
        foreach ($this->pinned_items as $item) {
            if( isset($item['pinned_post']) && $item['pinned_post']) {
                $pinned_posts[] = $item['pinned_post'];
            }
        }
        return $pinned_posts;
    }
}