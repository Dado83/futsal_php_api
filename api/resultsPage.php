<?php
require 'db.php';

$resultsNum = 7;

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
    return $arr;
}

function getFixtures($db, $mDay, $id = 12)
{
    $sql = "SELECT DISTINCT matchpairs.game_date
        FROM matchpairs
        WHERE m_day = $mDay AND NOT (matchpairs.home_team = $id XOR matchpairs.away_team = $id)";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    return $arr;
}

$results = [];
$gamedates = [];
for ($i = 1; $i <= $resultsNum; $i++) {
    $results[$i] = getResultsByMday($db, $i);
    $gamedates[$i] = getFixtures($db, $i);
}

$data = ['dates' => $gamedates, 'results' => $results];

echo json_encode($data);
