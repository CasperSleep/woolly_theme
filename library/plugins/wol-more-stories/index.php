<?php
namespace wol_more_stories;

class WOL_More_Stories
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

new WOL_More_Stories();