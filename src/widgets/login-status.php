<?php
	$loggedIn = $app->hasSession();
	$status   = $loggedIn?'Logged in':'Not logged in';
?>
<div class="mod login-status">
	<h2 class="hd">Facebook: <?php echo $status; ?></h2>
	<div class="bd">
		<ul>
		<?php if ($loggedIn): ?>
			<li><a href="/view/">View profile</a></li>
			<li><a href="<?php echo $page->logoutUrl; ?>">Log out</a></li>
		<?php else: ?>
			<li><a href="/login/">Log-in with Facebook</a></li>
		<?php endif; ?>
		</li>
	</div>
</div>
