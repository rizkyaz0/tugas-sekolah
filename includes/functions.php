<?php

function esc(?string $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function slugify(string $text): string {
    $text = preg_replace('~[\p{Pd}\s]+~u', '-', $text);
    $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    return strtolower($text ?: 'n-a');
}

function excerpt(string $html, int $length = 160): string {
    $text = trim(strip_tags($html));
    if (mb_strlen($text) <= $length) return $text;
    return mb_substr($text, 0, $length) . '…';
}

function indo_date(string $datetime): string {
    $ts = strtotime($datetime);
    if ($ts === false) return $datetime;
    $bulan = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    $d = (int)date('j', $ts);
    $m = (int)date('n', $ts);
    $y = date('Y', $ts);
    return $d . ' ' . $bulan[$m] . ' ' . $y;
}

function is_active(string $route, string $current): string {
    return $route === $current ? 'active' : '';
}
