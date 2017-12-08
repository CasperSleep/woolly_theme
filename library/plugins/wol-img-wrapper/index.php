<?php
namespace wol_img_wrapper;

use wol_img_wrapper\core\WOL_Img_Wrapper_Core;

class WOL_Img_Wrapper
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
//        new WOL_Admin();
        new WOL_Img_Wrapper_Core();

    }

    public function load_site()
    {
        if( is_admin() ) {
            return;
        }

        new WOL_Img_Wrapper_Core();
    }
}

new WOL_Img_Wrapper();