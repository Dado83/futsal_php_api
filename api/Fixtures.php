<?php
require 'db.php';

$mDay = $_GET['mday'];

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
    echo json_encode($arr);
}

function getFixturesNotPlayed($db, $id = 12)
{
    $sql = "SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_team, away.team_name AS away_team
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

if ($mDay !== 'notPlayed') {
    getFixtures($db, $mDay);
} elseif ($mDay === 'notPlayed') {
    getFixturesNotPlayed($db);
}
//getFixturesNotPlayed($db);