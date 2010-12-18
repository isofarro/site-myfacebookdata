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
		header('Location: ' . $loginUrl);
		exit;
		break;
	case 'callback':
		$app->handleCallback();
		//$request  = $app->parseRequest();
		// Clear out existing data about a user
		// Re-collect the data
		
		// warming the cache
		$profile = $app->getProfile();
		$public  = $app->getPublicProfile($profile->id);
		$perms   = $app->getProfilePermissions($profile->id);
        $friends = $app->getProfileFriends($profile->id);
        $news    = $app->getProfileNews($profile->id);
        $likes   = $app->getProfileLikes($profile->id);
				
		header('Location: http://' . $_SERVER['SERVER_NAME'] . '/view/');
		exit;
		break;
	case 'view':
		$page->profile = $app->getProfile();
		$page->public  = $app->getPublicProfile($page->profile->id);
		$page->perms   = $app->getProfilePermissions($page->profile->id);
		$page->friends = $app->getProfileFriends($page->profile->id);
		$page->news    = $app->getProfileNews($page->profile->id);
		$page->likes   = $app->getProfileLikes($page->profile->id);
		break;
	case 'logout':
		$app->cleanup();
		header('Location: ' . $page->logoutUrl);
		exit;
		break;
	default:
		break;
	
}





?>