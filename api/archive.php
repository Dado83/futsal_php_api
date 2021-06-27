<?php
require 'db.php';

$year = $_GET['year'];

function getArchive($year, $db)
{
    $sql = "SELECT * FROM $year ORDER BY $year.points DESC";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

function getAlltimeTable($db)
{
    $sql = "SELECT * FROM all_time_table ORDER BY points DESC";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

if ($year == 'alltime') {
    getAlltimeTable($db);
} else {
    getArchive($year, $db);
}