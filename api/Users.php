<?php
require 'db.php';

$user = $_GET['user'] ?? '';
$pass = $_GET['pass'] ?? '';

function checkLogin($user, $pass, $db)
{
    $sql = "SELECT * FROM users WHERE role = '$user'";
    $query = $db->query($sql);
    $dbPass = $query->fetch_object();

    if (isset($dbPass)) {
        if (!password_verify($pass, $dbPass->password)) {
            echo json_encode('not-admin');
        } else {
            echo json_encode('admin');

        }
    }
}

function getUsers($db)
{
    $sql = "SELECT * FROM users";
    $query = $db->query($sql);
    $result = $query->fetch_object();
    echo json_encode($result);
}

if ($user != '') {
    checkLogin($user, $pass, $db);
} else {
    getUsers($db);
}