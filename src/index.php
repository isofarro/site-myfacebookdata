<?php

define('FACEBOOK_SDK_DIR', dirname(dirname(__FILE__)).'/facebook-sdk/php-sdk');
define('MYFACEBOOKDATA_DIR', dirname(__FILE__));

require_once FACEBOOK_SDK_DIR   . '/src/facebook.php';
require_once MYFACEBOOKDATA_DIR . '/config.php';
require_once MYFACEBOOKDATA_DIR . '/MyFacebookData.php';

/** Create Model **/
$app = new MyFacebookData($config);
$profile = (object)array();

//$app->dump($app);
$request = $app->parseRequest();
$app->dump($request);

if (!empty($request->username)) {
	$user_public = $app->getPublicProfile($request->username);
}
else {
	$user_public = $app->getPublicProfile('markzuckerberg');
}


if ($user_public) {
	$profile->public = $user_public;
}


$app->dump($profile);

/****
$user_public = $app->getPublicProfile('mike.davies');

$profile = (object)array(
	'public' => $user_public
);

$app->dump($profile);
****/

?>