<?php


// Get any existing facebook session
$session = $app->getSession();

// Set up login and logout URLs
$page->loginUrl  = $app->getLoginUrl();
$page->logoutUrl = $app->getLogoutUrl();

// Set page-specific attributes
$page->id         = $view;
$page->title      = Helper::getPageTitle($view);


switch ($view) {
	
	case 'home':
		break;
	case 'login':
		break;
	case 'options':
		$params   = $app->getLoginParams();
		$loginUrl = $app->getLoginUrl($params);
		// TODO: Redirect to loginUrl and abort processing here
		break;
	case 'callback':
		$app->handleCallback();
		//$request  = $app->parseRequest();
		// Clear out existing data about a user
		// Re-collect the data
		$profile = $app->getProfile();
		break;
	case 'view':
		$page->profile = $app->getProfile();
		$page->public  = $app->getPublicProfile($page->profile->id);
		$page->perms   = $app->getProfilePermissions($page->profile->id);
		break;
	case 'logout':
		break;
	default:
		break;
	
}





?>