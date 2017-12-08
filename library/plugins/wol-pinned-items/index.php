<?php
namespace wol_pinned_items;

class WOL_Pinned_Items
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
new WOL_Pinned_Items();