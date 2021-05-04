<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'futsal';

$db = new mysqli($host, $username, $password, $database);
