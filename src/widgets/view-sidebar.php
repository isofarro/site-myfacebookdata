
<p class="private" style="border:1px solid #333;">Information with a beige background highlight isn't publicly visible, but available to third-party applications.</p>


<?php if (!empty($page->profile) && !empty($page->public)): ?>
	<?php if (!empty($page->friends->data)): ?>
	<div class="mod full-profile">
		<h2 class="hd">Your Friends</h2>
		<div class="bd">
			<ul class="friends private">
				<?php 
					$friends = array_slice($page->friends->data, 0, 20);
					foreach($friends as $friend) {
						echo <<<HTML
				<li><img src="http://graph.facebook.com/{$friend->id}/picture" height="50" width="50" alt="{$friend->name}" title="{$friend->name}"></li>
HTML;

					} 
				?>
			</ul>
			<p><b>1-<?php echo count($friends); ?></b> of <?php echo count($page->friends->data); ?> friends. Applications can pull the public profile information for all of your friends.</p>
		</div>
		<div class="ft"></div>
	</div>
	<?php endif;?>

	<?php if (!empty($page->likes->data)): ?>
	<div class="mod full-profile">
		<h2 class="hd">Your Likes</h2>
		<div class="bd">
			<ul class="likes">
				<?php 
					$likes = array_slice($page->likes->data, 0, 20);
					foreach($likes as $like) {
						echo <<<HTML
				<li><img src="http://graph.facebook.com/{$like->id}/picture" height="50" width="50" alt="{$like->name}" title="{$like->name}"></li>
HTML;

					} 
				?>
			</ul>
			<p><b>1-<?php echo count($likes); ?></b> of <?php echo count($page->likes->data); ?> likes. Each entry has it's own public information, and category.</p>
		</div>
		<div class="ft"></div>
	</div>
	<?php endif;?>

<?php endif; ?>