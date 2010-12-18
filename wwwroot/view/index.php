<?php
$view = 'view';
if (!empty($_GET['session'])) { $view = 'callback'; }
require_once '../../src/index.php';
?>