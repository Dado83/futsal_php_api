<?php
require 'DB.php';

$id = $_GET['id'];

function getResultsByID($id, $db)
{
    $sql = "SELECT * FROM results WHERE home_id = $id OR away_id = $id ORDER BY m_day";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

getResultsByID($id, $db);
