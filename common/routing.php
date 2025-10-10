<?php
$url = explode('/', $_GET['url']);
$pages=$url[0];
$files=$url[1];
$var = array_slice($url, 2);