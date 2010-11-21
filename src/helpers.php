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
	
	
	static function renderField($name, $data) {
		$fnName = 'renderField_'.$name;
		if (is_callable(array('Helper', $fnName))) {
			return call_user_func(array('Helper', $fnName), $data);
			//return 'Function exists';
		}
		return "<i>No rendered for <b>{$name}</b> found.</i>";
	}
	
	static function renderField_hometown($data) {
		return (empty($data->name))?'':$data->name;
	}
}


?>