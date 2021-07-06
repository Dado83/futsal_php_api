<?php
require 'db.php';

$table = $_GET['table'];
$isShortName = $_GET['shortName'] ?? false;
$placeHolder = 12;
$id1 = $_GET['id1'] ?? 13;
$id2 = $_GET['id2'] ?? 14;
$id3 = $_GET['id3'] ?? 15;
$id4 = $_GET['id4'] ?? 16;

//id vars determine clubs that don't have certain generations
function getTable($db, $table, $isShortName, $placeHolder, $id1, $id2, $id3, $id4)
{
    if ($isShortName) {
        $sql = "SELECT teams.team_name AS team,
            $table.id,
            $table.games_played,
            $table.games_won,
            $table.games_drew,
            $table.games_lost,
            CONCAT ($table.goals_scored, ':', $table.goals_conceded) AS goals,
            $table.goals_scored,
            $table.goals_conceded,
            $table.goals_scored - $table.goals_conceded AS g_diff,
            $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id IN ($placeHolder, $id1, $id2, $id3, $id4)
            ORDER BY $table.points DESC, g_diff DESC, $table.goals_scored DESC, team";
    } else {
        $sql = "SELECT CONCAT(teams.team_name, ' ', teams.team_city) AS team,
            $table.id,
            $table.games_played,
            $table.games_won,
            $table.games_drew,
            $table.games_lost,
            CONCAT ($table.goals_scored, ':', $table.goals_conceded) AS goals,
            $table.goals_scored,
            $table.goals_conceded,
            $table.goals_scored - $table.goals_conceded AS g_diff,
            $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id IN ($placeHolder, $id1, $id2, $id3, $id4)
            ORDER BY $table.points DESC, g_diff DESC, $table.goals_scored DESC, team";
    }
    $result = $db->query($sql);
    $arr = [];
    while ($row = $result->fetch_object()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

getTable($db, $table, $isShortName, $placeHolder, $id1, $id2, $id3, $id4);