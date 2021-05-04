<?php
require 'DB.php';

$id = $_GET['id'];

function getTeam($id, $db)
{
    $sql = "SELECT * FROM teams WHERE id=$id";
    $result = $db->query($sql);
    echo json_encode($result->fetch_object());
}

getTeam($id, $db);
