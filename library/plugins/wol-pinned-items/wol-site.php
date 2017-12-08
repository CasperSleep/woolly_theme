<?php
namespace wol_pinned_items;

use wol_pinned_items\core\WOL_Common;

class WOL_Site extends WOL_Common
{
    public function __construct()
    {
        parent::__construct();

        add_action('wol_reflect_pinned_item', [$this, 'reflect_pinned_item']);

        add_action('pre_get_posts', [$this, 'homepage_pre_get_posts']);
    }

    public function reflect_pinned_item()
    {
        $items = $this->get_pinned_items();

        $home = is_home() || is_archive();
        $size = 'w700';

        foreach ($items as $k => $item) {

            if (isset($item['image']) && $item['image']) {
                $items[$k]['image_url'] = $this->get_image_url($item, $size);
            }
        }

        if ($home) {
            wol_render_part_template(WOL_PLUGIN_PATH . '/wol-pinned-items/templates/site/homepage-pinned-items.php', [
                'items' => $items
            ]);
        } else {
            wol_render_part_template(WOL_PLUGIN_PATH . '/wol-pinned-items/templates/site/single-article-pinned-items.php', [
                'items' => $items
            ]);
        }
    }

    public function homepage_pre_get_posts($wp_query)
    {
        if ((is_home() || is_front_page()) && $wp_query->is_main_query()
            && (!isset($wp_query->query_vars['post_type']) || $wp_query->query_vars['post_type'] == 'any' || $wp_query->query_vars['post_type'] == '')
        ) {
            $pinned_posts = $this->get_pinned_posts();
            if (!empty($pinned_posts)) {
                $wp_query->query_vars['post__not_in'] = $pinned_posts;
            }
        }
    }

}