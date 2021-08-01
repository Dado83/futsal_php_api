<?php
require 'db.php';

$id = $_GET['id'];

function getTeam($id, $db)
{
    //$sql = "SELECT * FROM teams WHERE id=$id";
    //$result = $db->query($sql);

    $stmt = $db->prepare("SELECT * FROM teams WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo json_encode($result->fetch_object());
}

getTeam($id, $db);