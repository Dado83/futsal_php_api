<?php
require 'DB.php';

$mDay = $_GET['mday'] ?? '';

function getResultsByMday($db, $mday)
{
    $sql = "SELECT * FROM results WHERE m_day = $mday";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

function getMaxMday($db)
{
    $sql = "SELECT MAX(m_day) as mDay FROM matchpairs";
    $result = $db->query($sql);
    echo json_encode($result->fetch_object()->mDay);
}

if (!isset($_GET['maxmday'])) {
    getResultsByMday($db, $mDay);
} else {
    getMaxMday($db);
}