<?php
require 'db.php';

$user = $_GET['user'];
$pass = $_GET['pass'];

function checkLogin($user, $pass, $db)
{
    $sql = "SELECT * FROM users WHERE role = '$user'";
    $query = $db->query($sql);
    $dbPass = $query->fetch_object()->password;

    if (!password_verify($pass, $dbPass)) {
        echo json_encode('njet');
    } else {
        echo json_encode('admin');
    }
}

checkLogin($user, $pass, $db);