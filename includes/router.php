<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

// Parse route like /profil/visi-misi
$segments = [];
if (!empty($_GET['url'])) {
    $parts = explode('/', trim($_GET['url'], '/'));
    $segments = array_values(array_filter($parts, fn($p) => $p !== ''));
}

$page = $segments[0] ?? 'beranda';
$sub  = $segments[1] ?? '';
$extra = array_slice($segments, 2);

$currentRoute = $page; // for navbar highlighting

// Map to file path
$publicPages = [
    'beranda'   => __DIR__ . '/../pages/beranda.php',
    'profil'    => __DIR__ . '/../pages/profil/' . ($sub ?: 'index') . '.php',
    'layanan'   => __DIR__ . '/../pages/layanan/index.php',
    'berita'    => __DIR__ . '/../pages/berita/' . ($sub ?: 'index') . '.php',
    'pegawai'   => __DIR__ . '/../pages/pegawai/' . ($sub ?: 'index') . '.php',
    'kontak'    => __DIR__ . '/../pages/kontak/index.php',
    'informasi' => __DIR__ . '/../pages/informasi/' . ($sub ?: 'index') . '.php',
];

$target = $publicPages[$page] ?? __DIR__ . '/../pages/404.php';

// Provide common variables
$ROUTE = [
    'page' => $page,
    'sub'  => $sub,
    'extra'=> $extra,
];
