<?php
namespace wol_google;

use wol_google\core\WOL_Google_Verify_Core;

class WOL_Google {

	public function __construct()
	{
		new WOL_Google_Verify_Core();
	}
}
new WOL_Google();