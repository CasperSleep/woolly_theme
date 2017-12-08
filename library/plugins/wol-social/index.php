<?php
namespace wol_social;

class WOL_Social
{

    public function __construct()
    {
        if( ! is_admin() ){
            add_action('wp_head', [$this, 'add_social_meta'], 1);
        }
    }

    public function add_social_meta()
    {
        if(is_singular('post')) {
            $title = get_the_title();
            $permalink = get_permalink(get_the_ID());
            $f_paragraph = $this->get_fist_paragraph();

            $image = get_the_post_thumbnail_url();
            ?>
            <meta property="og:url" content="<?= $permalink ?>"/>
            <meta property="og:type" content="article"/>
            <meta property="og:locale" content="en_US" />
            <meta property="og:title" content="<?= $title ?>"/>
            <meta property="og:description" content="<?= $f_paragraph; ?>"/>
            <meta property="og:image" content="<?= $image ?>" />

            <meta name="twitter:card" content="summary_large_image" />
            <meta name="twitter:site" content="@Woolly" />
            <meta name="twitter:creator" content="@Woolly" />
            <meta name="twitter:title" content="<?= $title ?>"/>
            <meta name="twitter:description" content="<?= $f_paragraph; ?>"/>
            <meta name="twitter:image" content="<?= $image ?>"/>
            <?php
        }
    }

    public function get_fist_paragraph()
    {
        $first_paragraph = "";

        $post = get_post();
        if( $post ) {
	        $content = wpautop( $post->post_content );
	        if(preg_match('%(<p[^>]*>.*?</p>)%i', $content, $matches) ) {
		        $str = $matches[0];
		        $str = strip_tags($str, '<a><strong><em><span><i>');

		        $first_paragraph = wp_strip_all_tags($str, true);//htmlspecialchars('<p>' . $str . '</p>');
	        }
        }

	    return $first_paragraph;

    }
}

new WOL_Social();