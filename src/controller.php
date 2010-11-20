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
		break;
	case 'callback':
		// Clear out existing data about a user
		// Re-collect the data
		break;
	case 'view':
		break;
	case 'logout':
		break;
	default:
		break;
	
}





?>