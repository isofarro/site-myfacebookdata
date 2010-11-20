<p>Login view</p>

<?php if (!$session): ?>
	<a href="<?php echo $page->loginUrl; ?>"><img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif"></a> (Basic Facebook login)
<?php else: ?>
	
<?php endif; ?>