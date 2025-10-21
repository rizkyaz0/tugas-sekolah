<?php
// Legacy router kept for backward compatibility, map to new pattern
$url = isset($_GET['url']) ? explode('/', trim($_GET['url'], '/')) : [];
$pages = $url[0] ?? '';
$files = $url[1] ?? '';
$var = array_slice($url, 2);