<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json; charset=utf-8'");

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'futsal';

$db = new mysqli($host, $username, $password, $database);
$db->set_charset('utf8mb4');