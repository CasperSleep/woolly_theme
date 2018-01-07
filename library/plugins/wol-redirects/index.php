<?php
namespace wol_redirects;

class WOL_Redirects
{
    public function __construct()
    {
        $this->load_site();
    }

    public function load_site()
    {
        if( is_admin() ) {
            return;
        }

        add_action( 'template_redirect', [ $this, 'site_redirect' ], 1 );
    }

    public function site_redirect()
    {
        if( is_404() || is_search() || is_date() || is_attachment() || is_tax()
            ||  is_post_type_archive() ){
            wp_redirect( home_url(), 302 );
            exit;
        }
    }

}

new WOL_Redirects();