<?php
require 'DB.php';

$mDay = $_GET['mday'] ?? '';
$clubID = $_GET['clubid'] ?? '';
$maxMday = $_GET['maxmday'] ?? false;

function getResultsByClub($db, $id)
{
    $sql = "SELECT * FROM results WHERE home_id = $id OR away_id = $id ORDER BY m_day";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

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

if ($maxMday != false) {
    getMaxMday($db);
}
if ($clubID != '') {
    getResultsByClub($db, $clubID);
}
if ($mDay != '') {
    getResultsByMday($db, $mDay);
}