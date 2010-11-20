<?php
	$loggedIn = $app->hasSession();
	$status   = $loggedIn?'Logged in':'Not logged in';
?>
<div class="mod login-status">
	<h2 class="hd">Facebook: <?php echo $status; ?></h2>
	<div class="bd">
		<?php if ($loggedIn): ?>
			<a href="<?php echo $page->logoutUrl; ?>">
		      <img src="http://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif">
		    </a>
		<?php else: ?>
			<a href="/login/">Log-in with Facebook</a>
		<?php endif; ?>
	</div>
</div>
