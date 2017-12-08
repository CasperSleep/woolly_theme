<?php
namespace wol_media_extend;

class WOL_Media_Extend
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
    }
}
new WOL_Media_Extend();