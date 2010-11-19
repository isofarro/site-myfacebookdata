<?php

define('FACEBOOK_SDK_DIR',       dirname(dirname(__FILE__)).'/facebook-sdk/php-sdk');
define('MYFACEBOOKDATA_DIR',     dirname(__FILE__));
define('MYFACEBOOKDATA_PUBLIC',  dirname(MYFACEBOOKDATA_DIR).'/data/public');
define('MYFACEBOOKDATA_PRIVATE', dirname(MYFACEBOOKDATA_DIR).'/data/private');

require_once FACEBOOK_SDK_DIR   . '/src/facebook.php';
require_once MYFACEBOOKDATA_DIR . '/config.php';
require_once MYFACEBOOKDATA_DIR . '/helpers.php';
require_once MYFACEBOOKDATA_DIR . '/MyFacebookData.php';

/** Create Model **/
$app = new MyFacebookData($config);
$profile = (object)array();

//$app->dump($app);
$request = $app->parseRequest();

if (!empty($request->username)) {
	$user_public = $app->getPublicProfile($request->username);
}
else {
	$user_public = $app->getPublicProfile('markzuckerberg');
}


if ($user_public) {
	$profile->public = $user_public;
}

$profile->private = $app->getPrivateProfile();



include MYFACEBOOKDATA_DIR . '/view.php';


?>