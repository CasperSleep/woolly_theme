<?php
namespace wol_pinned_items;

use wol_pinned_items\core\WOL_Common;

class WOL_Admin extends WOL_Common
{
    private $menu_page_slug = 'wol_pinned_items';

    private $hook_suffix;

    public function __construct()
    {
        parent::__construct();

        //add to the menu
        add_action( 'init', function () {
            add_action('admin_menu', array($this, 'add_item_menu'));
        });

        add_action('admin_enqueue_scripts', array($this, 'load_scripts') );

        // AJAX actions.
        add_action( 'wp_ajax_ajax_add_edit_pinned_item', array($this, 'ajax_get_add_edit_pinned_item') );
        add_action( 'wp_ajax_ajax_save_pinned_item', array($this, 'ajax_save_pinned_item') );
    }

    public function load_scripts($hook)
    {
        if($hook == 'toplevel_page_' . $this->menu_page_slug) {
            add_thickbox();
            wp_enqueue_script('wol-pinned-items', WOL_PLUGIN_URI . '/wol-pinned-items/js/admin/pinned-items.js', array('jquery'), WOL_VERSION, true);
            wp_enqueue_style('wol-pinned-items', WOL_PLUGIN_URI . '/wol-pinned-items/css/admin/pinned-items.css', [], WOL_VERSION);
        }
    }

    public function add_item_menu()
    {
        //add page of SNS messages list
        $this->hook_suffix = add_menu_page(
            'Pinned Items', // page <title>
            'Pinned Items', // brand name. not translated
            'manage_options', // capability needed
            $this->menu_page_slug, // unique menu slug
            array( $this, 'show_set_pinned_items' ), // pageload callback
            'dashicons-image-filter',// icon
            9//position
        );
    }

    public function show_set_pinned_items()
    {
	    $items = $this->get_pinned_items();
	    foreach ( $items as $k => $item) {
	    	$items[$k]['image_url'] = $this->get_image_url($item);
	    }

        wol_render_part_template( WOL_PLUGIN_PATH . '/wol-pinned-items/templates/admin/pinned-items.php', array(
            'pinned_items' => $items
        ));
    }

    public function ajax_get_add_edit_pinned_item()
    {
        $type = $_POST['type'];

        $item = $this->get_pinned_item($type);
        $item['image_url'] = $this->get_image_url($item);

        $posts = get_posts(array(
            'numberposts' => -1,
            'post_type' => 'post',
            'post_status' => 'publish'
        ));

        ob_start();
        wol_render_part_template( WOL_PLUGIN_PATH . '/wol-pinned-items/templates/admin/add_edit_pinned-item.php', array(
            'posts' => $posts,
            'item' => $item,
            'type' => $type
        ));
        $data = ob_get_clean();
        echo json_encode(array('data' => $data));
        exit();
    }

    public function ajax_save_pinned_item()
    {
        $item = $_POST['item'];
        $item = stripslashes_deep($item);

        if( $this->save_pined_item($item) ) {
        	$type = $item['type'];
        	$item = $this->get_pinned_item($type);

	        $item['type'] = $type;
	        $item['image_url'] = $this->get_image_url($item);

            echo json_encode(array('data'=> $item));
        } else {
            echo json_encode(array('data'=> false));
        }
        exit();
    }
}