<?php
require 'db.php';

$mDay = $_GET['mday'] ?? null;
$fixtureNum = 7;

function getFixtures($db, $mDay, $id = 12)
{
    $sql = "SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_club, away.team_name AS away_club
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE m_day = $mDay AND NOT (matchpairs.home_team = $id XOR matchpairs.away_team = $id)";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    return $arr;
}

$fixtures = [];
for ($i = 1; $i <= $fixtureNum; $i++) {
    $fixtures[$i] = getFixtures($db, $i);
}

echo json_encode($fixtures);
