<?

class Helper {
	static $publicFilter = array('name','picture', 'link', 'avatar');
	
	static function formatLabel($label) {
		return ucfirst(str_replace('_', ' ', $label));
		
	}
	
	static function isDisplayable($name, $public=false) {
		return !in_array($name, self::$publicFilter);
	}
	
}


?>