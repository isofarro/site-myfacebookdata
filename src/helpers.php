<?

class Helper {
	static $pageTitles = array(
		'home'     => '',
		'view'     => 'View Profile',
		'login'    => 'Log-in via Facebook',
		'callback' => 'Facebook callback'
	);
	
	static $publicFilter = array('name','picture', 'link', 'avatar');
	
	static function getPageTitle($page) {
		return self::$pageTitles[$page];
	}
	
	static function formatLabel($label) {
		return ucfirst(str_replace('_', ' ', $label));
		
	}
	
	static function isDisplayable($name, $public=false) {
		return !in_array($name, self::$publicFilter);
	}
	
}


?>