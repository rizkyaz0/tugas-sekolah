<?php
require_once __DIR__ . '/config.php';

function getPDO(): PDO {
    global $DB;
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $DB['host'], $DB['name'], $DB['charset']);
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $DB['user'], $DB['pass'], $options);
    } catch (Throwable $e) {
        throw new RuntimeException('Database connection failed: ' . $e->getMessage(), previous: $e);
    }
    return $pdo;
}
