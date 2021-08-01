<?php
require 'db.php';

$mDay = $_GET['mday'] ?? '';
$clubID = $_GET['clubid'] ?? '';
$maxMday = $_GET['maxmday'] ?? false;
$prevRes = $_GET['prevres'] ?? '';
$nextFix = $_GET['nextfix'] ?? '';

function getResultsByClub($db, $id)
{
    //$sql = "SELECT * FROM results WHERE home_id = $id OR away_id = $id ORDER BY m_day";
    //$result = $db->query($sql);
    $stmt = $db->prepare("SELECT * FROM results WHERE home_id = ? OR away_id = ? ORDER BY m_day");
    $stmt->bind_param('ii', $id, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

function getResultsByMday($db, $mday)
{
    //$sql = "SELECT * FROM results WHERE m_day = $mday";
    //$result = $db->query($sql);
    $stmt = $db->prepare("SELECT * FROM results WHERE m_day = ?");
    $stmt->bind_param('i', $mday);
    $stmt->execute();
    $result = $stmt->get_result();

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

function getPrevResultsMday($db)
{
    $sql1 = "SELECT MAX(m_day) as mDay FROM results";
    $res1 = $db->query($sql1);
    $maxMday = $res1->fetch_object()->mDay;
    echo json_encode($maxMday);
}

function getNextFixMday($db)
{
    $sql1 = "SELECT MAX(m_day) as mDay FROM results";
    $res1 = $db->query($sql1);
    $maxMday = $res1->fetch_object()->mDay + 1;
    echo json_encode($maxMday);
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

if ($prevRes == 'prevres') {
    getPrevResultsMday($db);
}

if ($nextFix == 'nextfix') {
    getNextFixMday($db);
}