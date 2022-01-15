<?php
require 'db.php';

$mDay = $_GET['mday'] ?? null;
$notPlayed = $_GET['notPlayed'] ?? null;

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
    //echo json_encode($arr);
    return $arr;
}

function getFixturesNotPlayed($db, $id = 12)
{
    $sql = "SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home, away.team_name AS away
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.is_played = FALSE AND NOT (matchpairs.home_team = $id XOR matchpairs.away_team = $id)";
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

if (isset($_GET['notPlayed'])) {
    getFixturesNotPlayed($db);
} else {
    $arr = [];
    for ($i = 1; $i <= 7; $i++) {
        $arr[$i] = getFixtures($db, $i);
    }
    echo json_encode($arr);
}
