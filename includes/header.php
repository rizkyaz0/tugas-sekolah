<?php
require_once __DIR__ . '/config.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($SITE['full_name']) ?></title>
  <meta name="description" content="<?= esc($SITE['tagline']) ?>">
  <link rel="icon" href="<?= esc(base_url('images/logo1.ico')) ?>">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= esc(base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css')) ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="<?= esc(base_url('assets/css/theme.css')) ?>">
</head>
<body>
