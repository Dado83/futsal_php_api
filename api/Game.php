<?php
require 'db.php';

$game = $_GET['game'] ?? '';
$gameID = $_GET['gameID'] ?? '';

function deleteGame($db, $id)
{
    $sql = "SELECT * FROM results WHERE id = $id";
    $query = $db->query($sql);
    $result = $query->fetch_object();
    var_dump($result);

    $sql1 = "SELECT * FROM matchpairs WHERE home_team = $result->home_id AND away_team = $result->away_id";
    $query = $db->query($sql1);
    $matchpair = $query->fetch_object();
    var_dump($matchpair);

    $sqlPlayed = "UPDATE matchpairs SET is_played = FALSE WHERE id = $matchpair->id";
    $db->query($sqlPlayed);

    /* delete game */
    $sql_get = "SELECT * FROM results WHERE id = $id";
    $query = $db->query($sql_get);
    $res = $query->fetch_object();
    $game = array(
        'id' => $res->id, 'm_day' => $res->m_day, 'home' => $res->home_name,
        'home_id' => $res->home_id, 'away' => $res->away_name, 'away_id' => $res->away_id,
        'goals_h7' => $res->goals_home7, 'goals_a7' => $res->goals_away7,
        'goals_h8' => $res->goals_home8, 'goals_a8' => $res->goals_away8,
        'goals_h9' => $res->goals_home9, 'goals_a9' => $res->goals_away9,
        'goals_h10' => $res->goals_home10, 'goals_a10' => $res->goals_away10,
        'goals_h11' => $res->goals_home11, 'goals_a11' => $res->goals_away11,
    );
//7
    if ($game['goals_h7'] > $game['goals_a7']) {
        homeWinDel('table7', $game['home_id'], $game['away_id'], $game['goals_h7'], $game['goals_a7'], $db);
    } elseif ($game['goals_a7'] > $game['goals_h7']) {
        awayWinDel('table7', $game['home_id'], $game['away_id'], $game['goals_h7'], $game['goals_a7'], $db);
    } elseif ($game['goals_a7'] == $game['goals_h7'] && $game['goals_h7'] != -1) {
        drawDel('table7', $game['home_id'], $game['away_id'], $game['goals_h7'], $game['goals_a7'], $db);
    }
//8
    if ($game['goals_h8'] > $game['goals_a8']) {
        homeWinDel('table8', $game['home_id'], $game['away_id'], $game['goals_h8'], $game['goals_a8'], $db);
    } elseif ($game['goals_a8'] > $game['goals_h8']) {
        awayWinDel('table8', $game['home_id'], $game['away_id'], $game['goals_h8'], $game['goals_a8'], $db);
    } elseif ($game['goals_a8'] == $game['goals_h8']) {
        drawDel('table8', $game['home_id'], $game['away_id'], $game['goals_h8'], $game['goals_a8'], $db);
    }
//9
    if ($game['goals_h9'] > $game['goals_a9']) {
        homeWinDel('table9', $game['home_id'], $game['away_id'], $game['goals_h9'], $game['goals_a9'], $db);
    } elseif ($game['goals_a9'] > $game['goals_h9']) {
        awayWinDel('table9', $game['home_id'], $game['away_id'], $game['goals_h9'], $game['goals_a9'], $db);
    } elseif ($game['goals_a9'] == $game['goals_h9']) {
        drawDel('table9', $game['home_id'], $game['away_id'], $game['goals_h9'], $game['goals_a9'], $db);
    }
//10
    if ($game['goals_h10'] > $game['goals_a10']) {
        homeWinDel('table10', $game['home_id'], $game['away_id'], $game['goals_h10'], $game['goals_a10'], $db);
    } elseif ($game['goals_a10'] > $game['goals_h10']) {
        awayWinDel('table10', $game['home_id'], $game['away_id'], $game['goals_h10'], $game['goals_a10'], $db);
    } elseif ($game['goals_a10'] == $game['goals_h10'] && $game['goals_h10'] != -1) {
        drawDel('table10', $game['home_id'], $game['away_id'], $game['goals_h10'], $game['goals_a10'], $db);
    }
//11
    if ($game['goals_h11'] > $game['goals_a11']) {
        homeWinDel('table11', $game['home_id'], $game['away_id'], $game['goals_h11'], $game['goals_a11'], $db);
    } elseif ($game['goals_a11'] > $game['goals_h11']) {
        awayWinDel('table11', $game['home_id'], $game['away_id'], $game['goals_h11'], $game['goals_a11'], $db);
    } elseif ($game['goals_a11'] == $game['goals_h11'] && $game['goals_h11'] != -1) {
        drawDel('table11', $game['home_id'], $game['away_id'], $game['goals_h11'], $game['goals_a11'], $db);
    }

    $sql_del = "DELETE FROM results WHERE id = $id";
    $db->query($sql_del);
}

function homeWinDel($table, $home_id, $away_id, $goals_h, $goals_a, $db)
{
    $sql_h = "UPDATE $table
        SET games_played = games_played - 1, games_won = games_won - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a, points = points - 3
        WHERE id = $home_id";
    $db->query($sql_h);

    $sql_a = "UPDATE $table
        SET games_played = games_played - 1, games_lost = games_lost - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h
        WHERE id = $away_id";
    $db->query($sql_a);
}

function awayWinDel($table, $home_id, $away_id, $goals_h, $goals_a, $db)
{
    $sql_h1 = "UPDATE $table
        SET games_played = games_played - 1, games_lost = games_lost - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a
        WHERE id = $home_id";
    $db->query($sql_h1);

    $sql_a1 = "UPDATE $table
        SET games_played = games_played - 1, games_won = games_won - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h, points = points - 3
        WHERE id = $away_id";
    $db->query($sql_a1);
}

function drawDel($table, $home_id, $away_id, $goals_h, $goals_a, $db)
{
    $sql_h2 = "UPDATE $table
        SET games_played = games_played - 1, games_drew = games_drew - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a, points = points - 1
        WHERE id = $home_id";
    $db->query($sql_h2);

    $sql_a2 = "UPDATE $table
        SET games_played = games_played - 1, games_drew = games_drew - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h, points = points - 1
        WHERE id = $away_id";
    $db->query($sql_a2);
}

/* game input */
function inputGame($db, $id,
    $mday, $home, $home_id, $away, $away_id,
    $goals_h7, $goals_a7,
    $goals_h8, $goals_a8,
    $goals_h9, $goals_a9,
    $goals_h10, $goals_a10,
    $goals_h11, $goals_a11) {

    //check if there is already the result
    $sqlGame = "SELECT * FROM results WHERE home_id = $home_id AND away_id = $away_id";
    $query = $db->query($sqlGame);
    $game = $query->fetch_object();

    if ($game) {

    } else {
        $sqlInput = "INSERT INTO results
        (m_day, home_name, home_id, away_name, away_id,
        goals_home7, goals_away7,
        goals_home8, goals_away8,
        goals_home9, goals_away9,
        goals_home10, goals_away10,
        goals_home11, goals_away11) VALUES
        ($mday, '$home', $home_id, '$away', $away_id,
        $goals_h7, $goals_a7,
        $goals_h8, $goals_a8,
        $goals_h9, $goals_a9,
        $goals_h10, $goals_a10,
        $goals_h11, $goals_a11)";

        $db->query($sqlInput);

        //7
        if ($goals_h7 > $goals_a7) {
            homeWin('table7', $home_id, $away_id, $goals_h7, $goals_a7, $db);
        } elseif ($goals_a7 > $goals_h7) {
            awayWin('table7', $home_id, $away_id, $goals_h7, $goals_a7, $db);
        } elseif ($goals_a7 == $goals_h7 && $goals_a7 != -1) {
            gameDraw('table7', $home_id, $away_id, $goals_h7, $goals_a7, $db);
        }
        //8
        if ($goals_h8 > $goals_a8) {
            homeWin('table8', $home_id, $away_id, $goals_h8, $goals_a8, $db);
        } elseif ($goals_a8 > $goals_h8) {
            awayWin('table8', $home_id, $away_id, $goals_h8, $goals_a8, $db);
        } elseif ($goals_a8 == $goals_h8) {
            gameDraw('table8', $home_id, $away_id, $goals_h8, $goals_a8, $db);
        }
        //9
        if ($goals_h9 > $goals_a9) {
            homeWin('table9', $home_id, $away_id, $goals_h9, $goals_a9, $db);
        } elseif ($goals_a9 > $goals_h9) {
            awayWin('table9', $home_id, $away_id, $goals_h9, $goals_a9, $db);
        } elseif ($goals_a9 == $goals_h9) {
            gameDraw('table9', $home_id, $away_id, $goals_h9, $goals_a9, $db);
        }
        //10
        if ($goals_h10 > $goals_a10) {
            homeWin('table10', $home_id, $away_id, $goals_h10, $goals_a10, $db);
        } elseif ($goals_a10 > $goals_h10) {
            awayWin('table10', $home_id, $away_id, $goals_h10, $goals_a10, $db);
        } elseif ($goals_a10 == $goals_h10 && $goals_a10 != -1) {
            gameDraw('table10', $home_id, $away_id, $goals_h10, $goals_a10, $db);
        }
        //6
        if ($goals_h11 > $goals_a11) {
            homeWin('table11', $home_id, $away_id, $goals_h11, $goals_a11, $db);
        } elseif ($goals_a11 > $goals_h11) {
            awayWin('table11', $home_id, $away_id, $goals_h11, $goals_a11, $db);
        } elseif ($goals_a11 == $goals_h11 && $goals_a11 != -1) {
            gameDraw('table11', $home_id, $away_id, $goals_h11, $goals_a11, $db);
        }

        $sqlPlayed = "UPDATE matchpairs SET is_played = TRUE WHERE id = $id";
        $db->query($sqlPlayed);
    }
}

function awayWin($table, $home_id, $away_id, $goals_h, $goals_a, $db)
{
    $sql_h1 = "UPDATE $table
        SET games_played = games_played + 1, games_lost = games_lost + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a
        WHERE id = $home_id";
    $db->query($sql_h1);

    $sql_a1 = "UPDATE $table
        SET games_played = games_played + 1, games_won = games_won + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h, points = points + 3
        WHERE id = $away_id";
    $db->query($sql_a1);
}

function homeWin($table, $home_id, $away_id, $goals_h, $goals_a, $db)
{
    $sql_h = "UPDATE $table
        SET games_played = games_played + 1, games_won = games_won + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a, points = points + 3
        WHERE id = $home_id";
    $db->query($sql_h);

    $sql_a = "UPDATE $table
        SET games_played = games_played + 1, games_lost = games_lost + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h
        WHERE id = $away_id";
    $db->query($sql_a);
}

function gameDraw($table, $home_id, $away_id, $goals_h, $goals_a, $db)
{
    $sql_h2 = "UPDATE $table
        SET games_played = games_played + 1, games_drew = games_drew + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a, points = points + 1
        WHERE id = $home_id";
    $db->query($sql_h2);

    $sql_a2 = "UPDATE $table
        SET games_played = games_played + 1, games_drew = games_drew + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h, points = points + 1
        WHERE id = $away_id";
    $db->query($sql_a2);
}

/* check what to do */
if ($game == 'delete') {
    deleteGame($db, $gameID);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postObj = file_get_contents('php://input');
    $req = json_decode($postObj);
    $id = $req->id;
    $mday = $req->mday;
    $home = $req->home;
    $home_id = $req->homeID;
    $away = $req->away;
    $away_id = $req->awayID;
    $goals_h7 = $req->home7;
    $goals_a7 = $req->away7;
    $goals_h8 = $req->home8;
    $goals_a8 = $req->away8;
    $goals_h9 = $req->home9;
    $goals_a9 = $req->away9;
    $goals_h10 = $req->home10;
    $goals_a10 = $req->away10;
    $goals_h11 = $req->home11;
    $goals_a11 = $req->away11;

    inputGame($db, $id,
        $mday, $home, $home_id, $away, $away_id,
        $goals_h7, $goals_a7,
        $goals_h8, $goals_a8,
        $goals_h9, $goals_a9,
        $goals_h10, $goals_a10,
        $goals_h11, $goals_a11);

    echo json_encode('ubacen rezultat');
}
