<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>My Facebook Data</title>
	<link rel="stylesheet" href="/main.css" type="text/css">
</head>
<body>
	<div id="y-page">
		<div id="y-head">

			<h1>My Facebook Data</h1>
		</div>
		<div id="y-content">
			
			<div class="mod public-profile">
				<h2 class="hd">Available to everyone</h2>
				<div class="bd">
					<?php if ($profile->public->picture): ?>
						<img src="<?php echo $profile->public->picture; ?>" alt="" class="picture">
					<?php else: ?>
						<img src="<?php echo $profile->public->avatar; ?>" height="50" width="50" alt="" class="avatar">
					<?php endif; ?>
					<ul class="attributes">
						<li><b class="label">Name:</b> <a href="<?php echo $profile->public->link; ?>"><?php echo $profile->public->name; ?></a></li>
<?php
	foreach($profile->public as $name => $value) {
		if (Helper::isDisplayable($name, true)) {
			$name = Helper::formatLabel($name);
			echo <<<HTML
						<li><b class="label">{$name}:</b> {$value}</li>					
HTML;
			
		}
	}

?>						
					</ul>
					
				</div>
			</div>


			<div class="mod public-profile">
				<h2 class="hd">Profile information you have shared</h2>
				<div class="bd">

				</div>
			</div>


		</div>
		<div id="y-related">
			
			<div class="mod login-status">
				<div class="bd">
					<a href="<?php echo $app->getLoginUrl(); ?>"><img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif"></a>
				</div>
			</div>
			
			<p>Filters</p>
			
			<p>Privacy levels</p>

		</div>
		<div id="y-debug">
			<?php
				$app->dump($request);
				$app->dump($profile);
			?>
		</div>
		<div id="y-foot">
			<p>Copyright &copy; 2010 <a href="http://www.maboweb.co.uk/">maboweb</a></p>
			

		</div>
	</div>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
</body>
</html>