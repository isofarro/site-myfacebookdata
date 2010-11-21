<?php

session_start();

define('FACEBOOK_SDK_DIR',       dirname(dirname(__FILE__)).'/facebook-sdk/php-sdk');
define('MYFACEBOOKDATA_DIR',     dirname(__FILE__));
define('MYFACEBOOKDATA_PUBLIC',  dirname(MYFACEBOOKDATA_DIR).'/data/public');
define('MYFACEBOOKDATA_PRIVATE', dirname(MYFACEBOOKDATA_DIR).'/data/private');

require_once FACEBOOK_SDK_DIR   . '/src/facebook.php';
require_once MYFACEBOOKDATA_DIR . '/config.php';
require_once MYFACEBOOKDATA_DIR . '/helpers.php';
require_once MYFACEBOOKDATA_DIR . '/MyFacebookData.php';


$app  = new MyFacebookData($config, $view);
$page = (object)NULL;

include MYFACEBOOKDATA_DIR . '/controller.php';
include MYFACEBOOKDATA_DIR . '/layout.php';

?>