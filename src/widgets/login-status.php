<?php
	$loggedIn = $app->hasSession();
	$status   = $loggedIn?'Logged in':'Not logged in';
?>
<div class="mod login-status">
	<h2 class="hd">Facebook: <?php echo $status; ?></h2>
	<div class="bd">
		<ul>
		<?php if ($loggedIn): ?>
			<?php if ($view!=='view'): ?>
			<li><a href="/view/">View profile</a></li>
			<?php endif; ?>
			<li><a href="/login/logout/">Log out</a></li>
		<?php else: ?>
			<li><a href="/login/">Log-in with Facebook</a></li>
		<?php endif; ?>
		</li>
	</div>
</div>
