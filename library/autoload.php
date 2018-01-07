<?php
/**
 * @package Theme
 */

define('WOL_VERSION', '1.3');

// PATHS ARE DEFINED
define('WOL_PLUGIN_PATH', get_template_directory() . '/library/plugins');

// URI ARE DEFINED
define('WOL_PLUGIN_URI', get_template_directory_uri() . '/library/plugins');

/**
 * @param $class_name
 */
function wol_autoload_classes( $class_name ) {

    $prefix = 'wol-';
    //strtolower, change '-' to '_'
    $class_name = str_replace( '_', '-', strtolower( $class_name ) );

    //if class is not in the plugin/helper/widget, then stop function
    if( stripos( $class_name, $prefix ) !== 0 ) {
        return;
    }
    // if namespace is wrong then stop function1
    if( strpos( $class_name, '/' ) !== false ) {
        return;
    }

    $array_of_namespace = preg_split("/\\\\/", $class_name, -1, PREG_SPLIT_NO_EMPTY );
    $class_clear_name = array_pop( $array_of_namespace );

    //if class name has no prefix, then stop function
    if( stripos( $class_clear_name, $prefix ) !== 0 ) {
        return;
    }

    $file_name = $class_clear_name;

    $path_to_folder = WOL_PLUGIN_PATH . '/';

    //if class name equal plugin name, then try load file name 'base'
    if ($class_clear_name == reset($array_of_namespace)) {
        if (count($array_of_namespace) == 1) {
            //main file in plugins
            $file_name = 'index';
        }
    }

    //convert namespace into path and try to include file
    $path_to_file = $path_to_folder . implode("/", $array_of_namespace) . '/';
    if( file_exists( $path_to_file . $file_name . '.php' )) {
        include $path_to_file . $file_name . '.php';
    } else if($file_name == 'index' && file_exists( $path_to_file . $class_clear_name . '.php' )) {
        include $path_to_file . $class_clear_name . '.php';
    }
}

spl_autoload_register( 'wol_autoload_classes' );

/**
 * Load Plugins
 */
function wol_load_plugin( $plugin = null )
{
    global $wol_active_plugins;
    $prefix = 'wol-';

    if( is_null($wol_active_plugins) ) {
        $wol_active_plugins = array();
    }

    if ( ! isset( $plugin ) || in_array( $plugin, $wol_active_plugins ) ) {
        return;
    }

    if( strpos( $plugin, $prefix ) !== 0 ) {
        return;
    }

    $path = WOL_PLUGIN_PATH . '/' . $plugin . '/index.php';

    if ( ! stream_resolve_include_path( $path ) ) {
        return;
    }

    require_once $path;

    array_push( $wol_active_plugins, $plugin );
}

/**
 * Check: plugin is active?
 * @param $name
 * @return bool
 */
function is_wol_plugin_active( $name ) {
    global $wol_active_plugins;

    return in_array( $name, $wol_active_plugins );
}
