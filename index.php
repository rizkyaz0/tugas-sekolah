<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/includes/router.php';

// Layout
require_once __DIR__ . '/includes/header.php';
$currentRoute = $currentRoute ?? ($ROUTE['page'] ?? '');
require_once __DIR__ . '/includes/navbar.php';

// Render target page
if (is_file($target)) {
    // Make $ROUTE available in page scope
    $ROUTE = $ROUTE ?? [];
    // If berita/detail uses slug via query, map here as well
    if (($ROUTE['page'] ?? '') === 'berita' && ($ROUTE['sub'] ?? '') && !isset($_GET['slug'])) {
        $_GET['slug'] = $ROUTE['sub'];
    }
    require $target;
} else {
    require __DIR__ . '/pages/404.php';
}

require_once __DIR__ . '/includes/footer.php';
?>


