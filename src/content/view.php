

<?php if (!empty($page->profile) && !empty($page->public)): ?>
<div class="mod full-profile">
	<h2 class="hd">Full Profile</h2>
	<div class="bd">
		<?php if ($page->profile->picture): ?>
			<img src="<?php echo $page->profile->picture; ?>" alt="" class="picture">
		<?php else: ?>
			<img src="<?php echo $page->profile->avatar; ?>" height="50" width="50" alt="" class="avatar">
		<?php endif; ?>

		<ul class="attributes">
			<li class="public"><b class="label">Name:</b> <a href="<?php echo $page->profile->link; ?>"><?php echo $page->profile->name; ?></a></li>
		<?php
			$order = array_keys((array)$page->profile);
			foreach($order as $fieldName) {
				if (Helper::isDisplayable($fieldName, true)) {
					$class = empty($page->profile->{$fieldName})?''
						:empty($page->public->{$fieldName})?'private'
						:'public';
					$name  = Helper::formatLabel($fieldName);
					$value = $page->profile->{$fieldName};
					$value = Helper::renderField($fieldName, $value);

					if ($value) {
						echo <<<HTML
			<li class="$class"><b class="label">{$name}:</b> {$value}</li>					
HTML;
					}
				}
			}

		?>						
		</ul>

	</div>
	<div class="ft"></div>
</div>


<?php if (!empty($page->news->data)): ?>
<div class="mod full-profile">
	<h2 class="hd">Your News Stream</h2>
	<div class="bd">
		<ul class="news">
			<?php 
				$news = array_slice($page->news->data, 0, 5);
				foreach($news as $item) {
					echo <<<HTML
			<li><b>{$item->from->name}:</b> {$item->message}{$item->name}</li>
HTML;

				} 
			?>
		</ul>
		<p><b>1-<?php echo count($news); ?></b> of <?php echo count($page->news->data); ?> your news items.</p>
	</div>
	<div class="ft"></div>
</div>
<?php endif; ?>


<?php elseif (!empty($page->public)): ?>
<div class="mod full-profile">
	<h2 class="hd">Public Profile</h2>
	<div class="bd">
		<?php if ($page->profile->picture): ?>
			<img src="<?php echo $page->profile->picture; ?>" alt="" class="picture">
		<?php else: ?>
			<img src="<?php echo $page->profile->avatar; ?>" height="50" width="50" alt="" class="avatar">
		<?php endif; ?>
		
	</div>
	<div class="ft"></div>
</div>
<?php endif; ?>