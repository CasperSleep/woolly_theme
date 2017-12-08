<?php
namespace wol_img_wrapper\core;

class WOL_Img_Wrapper_Core
{
    public function __construct()
    {
    	global $cloudinary_plugin;

    	if( ! is_admin() && is_object($cloudinary_plugin) ) {
		    add_action( 'init', array( $cloudinary_plugin, 'config' ) );
	    }

	    add_filter('image_downsize', array($this, 'del_remote_resize'), 0, 3);
        add_filter('image_downsize', array($this, 'resize'), 2, 3);
    }


    public function del_remote_resize($dummy, $post_id, $size)
    {
        global $cloudinary_plugin;

        if( ! is_object($cloudinary_plugin) ) {
            return false;
        }
        $remove = false;
        if( $size && is_string($size) ) {
            switch ($size) {
                case 'post-thumbnail':
                case 'w326h199':
                case 'w815h498':
                case 'w700h427':
                case 'w735h450':
                    $remove = true;
                    break;
            }
        }

        if($remove) {
            $rv= remove_filter('image_downsize', [$cloudinary_plugin, 'remote_resize'], 1);
        }
        return false;
    }
    public function resize($dummy, $post_id, $size)
    {
        global $cloudinary_plugin;

        if( ! is_object($cloudinary_plugin) ) {
            return false;
        }

        if( $size && is_string($size) ) {
            $url = wp_get_attachment_url($post_id);
            $metadata = wp_get_attachment_metadata($post_id);
            if (\Cloudinary::option_get($metadata, "cloudinary") && preg_match('#(.*?)/(v[0-9]+/.*)$#', $url, $matches)) {

                $width = '';
	            $height = '';
                switch ($size) {
                    case 'post-thumbnail':
                        $width = 700;
                        break;
	                case 'w700':
                    case 'post-thumbnail-highlight':
                        $width = 700;
                        break;
                }
                if($width) {
                	if( !$height ) {
		                $height = ceil( 0.625 * $width ); // 8*5
	                }
                	$url = cloudinary_url($matches[2], [
                		'width' => $width,
		                'height' => $height,
		                'crop' => 'fit',
		                'fetch_format' => 'auto',
		                'quality' => 'auto',
						'flags' => 'lossy',
		                'secure' => true,
	                ]);
                    $this->restore_remote_resize();
                    return array($url, $width, $height, true);
                }
            }
        }
        return false;
    }

    public function restore_remote_resize()
    {
        global $cloudinary_plugin;

        $rv= add_filter('image_downsize', [$cloudinary_plugin, 'remote_resize'], 1, 3);
    }
}