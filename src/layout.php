<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>My Facebook Data<?php echo ($page->title)?': '.$page->title:''; ?></title>
	<link rel="stylesheet" href="/main.css" type="text/css">
</head>
<body>
	<div id="y-page">
		<div id="y-head">

			<h1>My Facebook Data<?php if ($page->title){ echo ': ' . ucfirst($page->id); } ?></h1>
		</div>
		<div id="y-content">
			<?php include MYFACEBOOKDATA_DIR . '/content/' . $page->id . '.php'; ?>


		</div>
		<div id="y-related">
			
			<?php 
				include MYFACEBOOKDATA_DIR . '/widgets/login-status.php'; 
				
				if ($view==='view') {
					include MYFACEBOOKDATA_DIR . '/widgets/view-sidebar.php'; 
				}
				
				//include MYFACEBOOKDATA_DIR . '/widgets/filter-options.php'; 
				//include MYFACEBOOKDATA_DIR . '/widgets/privacy-levels.php'; 
			?>

		</div>
<?php if (false): ?>
		<div id="y-debug">
			<?php
				$app->dump($page);
				$app->dump($session);
				$app->dump($_REQUEST);
				$app->dump($_SESSION);
				//$app->dump($request);
				//$app->dump($_COOKIE);
			?>
		</div>
<?php endif; ?>
		<div id="y-foot">
			<p>Copyright &copy; 2010, a <a href="http://www.maboweb.co.uk/">MaboWeb</a> production.</p>
			

		</div>
	</div>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
</body>
</html>