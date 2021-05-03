<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");
require 'DB.php';

$db = new DB('localhost', 'root', '', 'futsal');
$db->DBconnect();
$id = $_GET['id'];
$db->select($id);