<?php
session_start();

// --- Site configuration ---
$SITE = [
    'short_name' => 'PN Subang',
    'full_name'  => 'Pengadilan Negeri Subang Kelas IB',
    'institution' => 'Mahkamah Agung Republik Indonesia',
    'tagline'    => 'Pelayanan Peradilan Cepat, Sederhana, dan Biaya Ringan',
    'address'    => 'Jl. Mayjen Sutoyo No. 1, Karanganyar, Subang, Jawa Barat 41211',
    'phone'      => '(0260) 411110',
    'email'      => 'pn.subang@mahkamahagung.go.id',
    'facebook'   => '#',
    'twitter'    => '#',
    'instagram'  => '#',
    'youtube'    => '#',
];

// --- Base URL helper ---
function base_url(string $path = ''): string {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $scriptDir = rtrim(str_replace('index.php', '', $_SERVER['SCRIPT_NAME'] ?? '/'), '/');
    $base = $scheme . '://' . $host . $scriptDir;
    if ($path === '') return rtrim($base, '/') . '/';
    return rtrim($base, '/') . '/' . ltrim($path, '/');
}

// --- Database configuration (use env if available) ---
$DB = [
    'host'    => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'name'    => $_ENV['DB_NAME'] ?? 'pn_subang',
    'user'    => $_ENV['DB_USER'] ?? 'root',
    'pass'    => $_ENV['DB_PASS'] ?? '',
    'charset' => 'utf8mb4',
];

// --- Admin authentication (simple) ---
// Change these in production!
$ADMIN = [
    'username' => $_ENV['ADMIN_USERNAME'] ?? 'admin',
    'password' => $_ENV['ADMIN_PASSWORD'] ?? 'admin123', // simple demo credential
];

// --- App constants ---
const UPLOADS_DIR = __DIR__ . '/../uploads';
const UPLOADS_URL = 'uploads';

@mkdir(UPLOADS_DIR . '/posts', 0775, true);
@mkdir(UPLOADS_DIR . '/employees', 0775, true);
