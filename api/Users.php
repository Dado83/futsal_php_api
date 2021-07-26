<?php
require 'db.php';

$postRequest = file_get_contents('php://input');
$reqObj = json_decode($postRequest);
$user = $reqObj->user;
$pass = $reqObj->pass;

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

function getUsers($db) /* not needed for the time being... */
{
    $sql = "SELECT * FROM users";
    $query = $db->query($sql);
    $result = $query->fetch_object();
    echo json_encode($result);
}

checkLogin($user, $pass, $db);