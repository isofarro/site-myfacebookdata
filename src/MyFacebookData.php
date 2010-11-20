<?php

class MyFacebookData {
	var $view;
	var $fb;
	var $session;
	var $me = NULL;
	
	var $loginParams = array(
		'next'       => 'http://myfacebookdata.dev/view/',
		'cancel_url' => 'http://myfacebookdata.dev/login/'
	);
	var $logoutParams = array(
		'next'       => 'http://myfacebookdata.dev/view/'
	);
	
	public function __construct($config, $view) {
		if (is_array($config)) {
			$this->fb = new Facebook($config);
		}
		$this->view = $view;
		
		$this->session = $this->fb->getSession();
	}
	
	public function hasSession() {
		return ($this->session)?true:false;
	}
	
	public function getSession() {
		return $this->session;
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
		
		if ($this->cached($username, true)) {
			return $this->load($username, true);
		}
		else {
			$profile = (object)$this->fb->api('/'.$username);

			if (!empty($profile->id)) {
				$profile->avatar = 'https://graph.facebook.com/'.$profile->id.'/picture';
			}

			$this->save($username, $profile, true);

			return $profile;
		}
	}
	
	public function getPrivateProfile() {
		$profile=(object)NULL;
		if ($this->session) {
		  try {
		    //$profile->uid = $this->fb->getUser();
		    $profile      = (object)$this->fb->api('/me');
		  } catch (FacebookApiException $e) {
		    error_log($e);
		  }
		}
		return $profile;
	}
	
	public function getLoginUrl() {
		return $this->fb->getLoginUrl($this->loginParams);
	}

	public function getLogoutUrl() {
		return $this->fb->getLogoutUrl($this->logoutParams);
	}
	
	
	
	protected function cached($name, $public=false) {
		$dir  = $public?MYFACEBOOKDATA_PUBLIC:MYFACEBOOKDATA_PRIVATE;
		$file = $dir . '/' . $name . '.json';
		return file_exists($file);
	}
	
	protected function save($name, $obj, $public=false) {
		$dir  = $public?MYFACEBOOKDATA_PUBLIC:MYFACEBOOKDATA_PRIVATE;
		$file = $dir . '/' . $name . '.json';
		$ser  = json_encode($obj);
		return file_put_contents($file, $ser);
	}
	
	protected function load($name, $public=false) {
		$dir  = $public?MYFACEBOOKDATA_PUBLIC:MYFACEBOOKDATA_PRIVATE;
		$file = $dir . '/' . $name . '.json';
		if (file_exists($file)) {
			return json_decode(file_get_contents($file));
		}
		return NULL;
	}
	
}

?>