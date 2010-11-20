

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
					$value = (is_string($value))?$value:'{DATA}';

					if ($value) {
						echo <<<HTML
			<li class="$class"><b class="label">{$name}:</b> {$value}</li>					
HTML;
					}
				}
			}

		?>						
		</ul>

		<h2>Connections</h2>
		
		<p class="private">Information with a background highlight isn't publicly visible, but available to third-party applications.</p>
		
	</div>
	<div class="ft"></div>
</div>
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