<?php
namespace wol_google\core;

class WOL_Google_Verify_Core {

	private $google_file_var = 'google_verify_file';

	private $google_file_name = 'googlee13521d6a9787a52';

	public function __construct()
	{
		/**
		 * add new query var
		 */
		add_filter( 'query_vars', array( $this, 'add_new_query_vars' ), 0, 1 );

		/**
		 * rewrite rule for google file
		 */
		add_filter( 'rewrite_rules_array', array( $this, 'add_rewrite_rules' ), 1, 1 );

		/**
		 * redirect to google file content
		 */
		add_filter( 'template_redirect', array( $this, 'display_google_file' ), 0, 0 );

	}

	public function add_new_query_vars($query_vars)
	{
		array_push($query_vars, $this->google_file_var);
		return $query_vars;
	}

	/**
	 * Display google file
	 */
	public function display_google_file() {
		global $wp_query;

		if( ! empty($wp_query->query_vars[$this->google_file_var])) {

			$wp_query->is_404 = false;
			$wp_query->is_feed = false;

			header('Content-Type: text/plain; charset=utf-8');
			echo file_get_contents( WOL_PLUGIN_PATH . "/wol-google/core/" . $this->google_file_name . ".html");

			exit;
		}
	}

	public function add_rewrite_rules($original_rules) {

		$new_rules = array();
		$new_rules[$this->google_file_name . '\.html'] = 'index.php?' . $this->google_file_var . '=1';

		return array_merge($new_rules,$original_rules);
	}
}