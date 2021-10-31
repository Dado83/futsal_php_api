<?php
require 'db.php';

$name = 'deadpool';
$value = 'admin';
$expiry = time() + (86400 * 30 * 12);
setcookie($name, $value, $expiry);

if (!isset($_COOKIE['deadpool'])) {
echo 'ima kuki';
}

if (isset($_COOKIE['deadpool'])) {
echo 'cookie set';
}
