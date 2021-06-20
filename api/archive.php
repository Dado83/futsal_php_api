<?php
require 'db.php';

$year = $_GET['year'];

function getArchive($year, $db)
{
    $sql = "SELECT * FROM $year";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

getArchive($year, $db);
