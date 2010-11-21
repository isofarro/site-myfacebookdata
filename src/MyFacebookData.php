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
		
		if ($req->perms) {
			$request->permissions = explode(',', $req->perms);
		}

		if ($req->selected_profiles) {
			$request->ids = explode(',', $req->selected_profiles);
		}
		
		return $request;
	}
	
	public function handleCallback($req=NULL) {
		if (!$req) {
			global $_REQUEST;
			$req = (object)$_REQUEST;
		}
		
		$access = (object)array();
		
		if ($req->perms) {
			$access->perms = explode(',', $req->perms);
		}

		if ($req->selected_profiles) {
			$profileIds = explode(',', $req->selected_profiles);
			foreach ($profileIds as $profileId) {
				$access->id = $profileId;
				$this->save($access->id.'__perms', $access);
			}
		}



		return $access;
	}
	
	public function getLoginParams($data=NULL) {
		if ($data===NULL) {
			global $_REQUEST;
			$data = $_REQUEST;
		}
		
		$params = array();
		
		$params['next']       = $data['next'];
		$params['cancel_url'] = $data['cancel_url'];
		$params['req_perms']  = implode(',', $data['req_perms']);
		
		return $params;
	}
	
	public function getPublicProfile($username) {
		
		if ($this->cached($username, true)) {
			return $this->load($username, true);
		}
		else {
			//$profile = (object)$this->fb->api('/'.$username);
			
			// Construct profile without using credentials
			$url = 'https://graph.facebook.com/'.$username;
			$profile = json_decode($this->simpleGet($url));
			
			if (!empty($profile->id)) {
				$profile->avatar = 'http://graph.facebook.com/'.$profile->id.'/picture';
				$this->save($username, $profile, true);
			}


			return $profile;
		}
	}
	
	public function getProfile($userid=NULL) {
		$me = false;
		
		// Which userid to show?
		if (!$userid && $this->hasSession()) {
			$userid = $this->fb->getUser();
			$me = true;
		}

		// TODO: Are you allowed to show it?

		// Check for a cached version
		if ($userid && $this->cached($userid, false)) {
			return $this->load($userid, false);
		}
		else {
			if ($me) {
				$profile = (object)$this->fb->api('/me');
			}
			else {
				$profile = (object)$this->fb->api('/'.$userid);
			}
			
			if (!empty($profile->id)) {
				$profile->avatar = 'http://graph.facebook.com/'.$profile->id.'/picture';
				$this->save($profile->id, $profile, false);
			}

			return $profile;
		}

	}
	
	public function getProfilePermissions($userid=NULL) {
		$perms = NULL;
		
		// Which userid to show?
		if (!$userid && $this->hasSession()) {
			$userid = $this->fb->getUser();
			$me = true;
		}

		// TODO: Are you allowed to show it?

		// Check for a cached version
		if ($userid && $this->cached($userid, false)) {
			return $this->load($userid.'__perms', false);
		}
		return $perms;
	}
	
	//public function getPrivateProfile() {
	//	$profile=(object)NULL;
	//	if ($this->session) {
	//	  try {
	//	    //$profile->uid = $this->fb->getUser();
	//	    $profile      = (object)$this->fb->api('/me');
	//	  } catch (FacebookApiException $e) {
	//	    error_log($e);
	//	  }
	//	}
	//	return $profile;
	//}
	
	public function getLoginUrl($params=NULL) {
		if (!$params) {
			$params = $this->loginParams;
		}
		return $this->fb->getLoginUrl($params);
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
		
		if (file_exists($file)) {
			unlink($file);
		}
		
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
	
	protected function simpleGet($url) {
		// create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// grab URL and pass it to the browser
		$response = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);
		
		//print_r($result);
		return $response;
	}
	
}

?>