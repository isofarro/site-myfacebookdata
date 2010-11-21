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
		elseif (is_string($data)) {
			return $data;
		}
		
		return "<i>No renderer for <b>{$name}</b> found.</i>";
	}
	
	static function renderField_hometown($data) {
		return (empty($data->name))?'':$data->name;
	}

	static function renderField_location($data) {
		return (empty($data->name))?'':$data->name;
	}
	
	static function renderField_verified($data) {
		return ($data)?'Yes':'No';
	}
	
	static function renderField_work($data) {
		$buffer = array();
		foreach($data as $item) {
			$endDate = '';
			if ($item->end_date !== '0000-00') {
				$endDate = ' to ' . $item->end_date;
			}
			$description = '';
			if ($item->description) {
				$description = ' - ' . $item->description;
			}
			$buffer[] = <<<HTML
<p class="roles">
<b>{$item->employer->name}: {$item->position->name}</b> 
({$item->start_date}{$endDate})
{$description}
</p>
HTML;
		}
		return implode("\n", $buffer);
	}
}


?>