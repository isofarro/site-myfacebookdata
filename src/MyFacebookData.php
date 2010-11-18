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
	
	public function parseRequest($req=null) {
		if (!$req) {
			global $_GET;
			$req = (object)$_GET;
		}
		
		$request = (object)array();

		if ($req->username) {
			$request->username = $req->username;
		}
		
		return $request;
	}
	
	public function getPublicProfile($username) {
		$profile = (object)$this->fb->api('/'.$username);
		
		if (!empty($profile->id)) {
			$profile->avatar = 'https://graph.facebook.com/'.$profile->id.'/picture';
		}
		
		return $profile;
	}
	
}

?>