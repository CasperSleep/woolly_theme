<?php
namespace wol_highlighted_article;

class WOL_Highlighted_Article
{
    public function __construct()
    {
        $this->load_admin();
        $this->load_site();
    }

    public function load_admin()
    {
        if( ! is_admin() ) {
            return;
        }
        new WOL_Admin();

    }

    public function load_site()
    {
        if( is_admin() ) {
            return;
        }
        new WOL_Site();
    }
}

new WOL_Highlighted_Article();