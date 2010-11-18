<?php

echo '<h1>MyFacebookData</h1>';

echo <<<HTML
<ul>
	<li><a href="/view/">View Your Public Profile</a></li>
	<li><a href="/view/?profile=mike.davies">View Mike Davies' public profile</a></li>
	<li><a href="/view/?profile=mapocathy">View Cathy Ma's public profile</a></li>
</ul>
HTML;

?>