<?php

define('FACEBOOK_SDK_DIR', dirname(dirname(__FILE__)).'/facebook-sdk/php-sdk');
define('MYFACEBOOKDATA_DIR', dirname(__FILE__));

require_once FACEBOOK_SDK_DIR   . '/src/facebook.php';
require_once MYFACEBOOKDATA_DIR . '/config.php';
require_once MYFACEBOOKDATA_DIR . '/MyFacebookData.php';

$app = new MyFacebookData($config);
$app->dump($app);

?>