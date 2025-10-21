<?php
// Basic mysqli connection for dummy DB usage
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db   = 'pengadilan_subang';

$mysqli = @new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    die('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
