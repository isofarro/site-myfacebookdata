<?php

class MyFacebookData {
	var $fb;
	
	public function __construct($config) {
		if (is_array($config)) {
			$this->fb = new Facebook($config);
		}
	}
	
	public function dump($object) {
		echo "<pre>";
		print_r($object);
		echo "</pre>";
	}
	
}

?>