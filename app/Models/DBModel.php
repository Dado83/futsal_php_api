<?php namespace App\Models;

use CodeIgniter\Model;

class DBModel extends Model
{

    public function getTeams($id = 12)
    {
        $sql = "SELECT * FROM teams WHERE NOT id = $id";
        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function getTable($table, $isShortName = false, $id1 = 12, $id2 = 13, $id3 = 14, $id4 = 15)
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
            $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id IN ($id1, $id2, $id3, $id4)
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
            $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id IN ($id1, $id2, $id3, $id4)
            ORDER BY $table.points DESC, g_diff DESC, $table.goals_scored DESC, team";
        }
        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function getTeamByTablePos($table, $pos, $id = 12)
    {
        $pos--;
        $sql = "SELECT teams.team_name AS team,
            $table.id,
            $table.games_played,
            $table.games_won,
            $table.games_drew,
            $table.games_lost,
            CONCAT ($table.goals_scored, ':', $table.goals_conceded) AS goals,
            $table.goals_scored - $table.goals_conceded AS g_diff,
            $table.points FROM $table JOIN teams ON $table.id = teams.id WHERE NOT teams.id=$id
            ORDER BY $table.points DESC, g_diff DESC, $table.goals_scored DESC, team
            LIMIT 1 OFFSET $pos";

        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getTeamByID($id)
    {
        $sql = "SELECT * FROM teams WHERE id = $id";
        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getResultsByID($id)
    {
        $sql = "SELECT * FROM results WHERE home_id = $id OR away_id = $id ORDER BY m_day";
        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function checkForResult($home, $away)
    {
        $sql = "SELECT * FROM results WHERE home_id = $home AND away_id = $away";
        $query = $this->db->query($sql);
        return $query->getRow() ? true : false;
    }

    public function getAllMatchPairs($id = 12)
    {
        $sql = "SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_club, away.team_name AS away_club
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE NOT (matchpairs.home_team = $id XOR matchpairs.away_team = $id)";

        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function getMatchPairs($mday, $id = 12)
    {
        $sql = "SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_club, away.team_name AS away_club
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.m_day = $mday AND NOT (matchpairs.home_team = $id XOR matchpairs.away_team = $id)";

        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function getMatchPairsByTeam($id, $mday = 0)
    {
        $sql = "SELECT matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_club, away.team_name AS away_club
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.home_team = $id OR matchpairs.away_team = $id";

        $query = $this->db->query($sql);
        return $query ? $query->getResult() : array();
    }

    public function getMatchDates($mday, $pairNotToShow = 12)
    {
        $sql = "SELECT DISTINCT matchpairs.game_date
        FROM matchpairs
        WHERE m_day = $mday AND NOT (matchpairs.home_team = $pairNotToShow XOR matchpairs.away_team = $pairNotToShow)";

        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getMatchPairsNotPlayed($id = 12)
    {
        $sql = "SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home_team, away.team_name AS away_team
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.is_played = FALSE AND NOT (matchpairs.home_team = $id XOR matchpairs.away_team = $id)";

        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function getResults()
    {
        $sql = "SELECT * FROM results ORDER BY m_day";
        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function getResultsByMday($mday)
    {
        $sql = "SELECT * FROM results WHERE m_day = $mday";
        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function getNextFixture($pairNotToShow = 12)
    {
        $sql_last = "SELECT DISTINCT m_day FROM results";
        $query_num = $this->db->query($sql_last);
        $mday_num = sizeof($query_num->getResult());
        $next_game = ++$mday_num;
        $sql = "SELECT matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home, away.team_name AS away, home.game_time, home.venue
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.m_day = $next_game AND NOT (matchpairs.home_team = $pairNotToShow XOR matchpairs.away_team = $pairNotToShow)";

        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }

    public function getGameByID($id)
    {
        $sql = "SELECT matchpairs.id, matchpairs.m_day, matchpairs.home_team, matchpairs.away_team, matchpairs.game_date,
        home.team_name AS home, away.team_name AS away, home.game_time, home.venue
        FROM matchpairs
        JOIN teams AS home ON matchpairs.home_team = home.id
        JOIN teams AS away ON matchpairs.away_team = away.id
        WHERE matchpairs.id = $id";

        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getGameFromResults($id)
    {
        $sql = "SELECT * FROM results WHERE id = $id";
        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getMatchPair($home, $away)
    {
        $sql = "SELECT * FROM matchpairs WHERE home_team = $home AND away_team = $away";
        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getNextGameDate($mday)
    {
        $sql = "SELECT * FROM matchpairs WHERE m_day = $mday";
        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getNotPlaying($mday = 0)
    {
        if ($mday == 0) {
            $sql = "SELECT * FROM notplaying";
            $query = $this->db->query($sql);
            return ($query) ? $query->getResult() : array();
        } else {
            $sql = "SELECT * FROM notplaying WHERE m_day = $mday";
            $query = $this->db->query($sql);
            return ($query) ? $query->getRow() : array();
        }
    }

    public function setPlayed($id, $isPlayed)
    {
        $sqlPlayed = "UPDATE matchpairs SET is_played = $isPlayed WHERE id = $id";
        $this->db->query($sqlPlayed);
    }

    public function insertGame($mday, $home, $home_id, $away, $away_id,
        $goals_h7, $goals_a7,
        $goals_h8, $goals_a8,
        $goals_h9, $goals_a9,
        $goals_h10, $goals_a10,
        $goals_h11, $goals_a11) {

        $sql = "INSERT INTO results
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

        $this->db->query($sql);

        //7
        if ($goals_h7 > $goals_a7) {
            $this->homeWin('table7', $home_id, $away_id, $goals_h7, $goals_a7);
        } elseif ($goals_a7 > $goals_h7) {
            $this->awayWin('table7', $home_id, $away_id, $goals_h7, $goals_a7);
        } elseif ($goals_a7 == $goals_h7 && $goals_a7 != -1) {
            $this->gameDraw('table7', $home_id, $away_id, $goals_h7, $goals_a7);
        }
        //8
        if ($goals_h8 > $goals_a8) {
            $this->homeWin('table8', $home_id, $away_id, $goals_h8, $goals_a8);
        } elseif ($goals_a8 > $goals_h8) {
            $this->awayWin('table8', $home_id, $away_id, $goals_h8, $goals_a8);
        } elseif ($goals_a8 == $goals_h8) {
            $this->gameDraw('table8', $home_id, $away_id, $goals_h8, $goals_a8);
        }
        //9
        if ($goals_h9 > $goals_a9) {
            $this->homeWin('table9', $home_id, $away_id, $goals_h9, $goals_a9);
        } elseif ($goals_a9 > $goals_h9) {
            $this->awayWin('table9', $home_id, $away_id, $goals_h9, $goals_a9);
        } elseif ($goals_a9 == $goals_h9) {
            $this->gameDraw('table9', $home_id, $away_id, $goals_h9, $goals_a9);
        }
        //10
        if ($goals_h10 > $goals_a10) {
            $this->homeWin('table10', $home_id, $away_id, $goals_h10, $goals_a10);
        } elseif ($goals_a10 > $goals_h10) {
            $this->awayWin('table10', $home_id, $away_id, $goals_h10, $goals_a10);
        } elseif ($goals_a10 == $goals_h10 && $goals_a10 != -1) {
            $this->gameDraw('table10', $home_id, $away_id, $goals_h10, $goals_a10);
        }
        //6
        if ($goals_h11 > $goals_a11) {
            $this->homeWin('table11', $home_id, $away_id, $goals_h11, $goals_a11);
        } elseif ($goals_a11 > $goals_h11) {
            $this->awayWin('table11', $home_id, $away_id, $goals_h11, $goals_a11);
        } elseif ($goals_a11 == $goals_h11 && $goals_a11 != -1) {
            $this->gameDraw('table11', $home_id, $away_id, $goals_h11, $goals_a11);
        }
    }

    private function awayWin($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h1 = "UPDATE $table
        SET games_played = games_played + 1, games_lost = games_lost + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a
        WHERE id = $home_id";
        $this->db->query($sql_h1);

        $sql_a1 = "UPDATE $table
        SET games_played = games_played + 1, games_won = games_won + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h, points = points + 3
        WHERE id = $away_id";
        $this->db->query($sql_a1);
    }

    private function homeWin($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h = "UPDATE $table
        SET games_played = games_played + 1, games_won = games_won + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a, points = points + 3
        WHERE id = $home_id";
        $this->db->query($sql_h);

        $sql_a = "UPDATE $table
        SET games_played = games_played + 1, games_lost = games_lost + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h
        WHERE id = $away_id";
        $this->db->query($sql_a);
    }

    private function gameDraw($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h2 = "UPDATE $table
        SET games_played = games_played + 1, games_drew = games_drew + 1,
        goals_scored = goals_scored + $goals_h, goals_conceded = goals_conceded + $goals_a, points = points + 1
        WHERE id = $home_id";
        $this->db->query($sql_h2);

        $sql_a2 = "UPDATE $table
        SET games_played = games_played + 1, games_drew = games_drew + 1,
        goals_scored = goals_scored + $goals_a, goals_conceded = goals_conceded + $goals_h, points = points + 1
        WHERE id = $away_id";
        $this->db->query($sql_a2);
    }

    public function deleteGame($id)
    {
        $sql_get = "SELECT * FROM results WHERE id = $id";
        $query = $this->db->query($sql_get);
        $res = $query->getRow();
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
            $this->homeWinDel('table7', $game['home_id'], $game['away_id'], $game['goals_h7'], $game['goals_a7']);
        } elseif ($game['goals_a7'] > $game['goals_h7']) {
            $this->awayWinDel('table7', $game['home_id'], $game['away_id'], $game['goals_h7'], $game['goals_a7']);
        } elseif ($game['goals_a7'] == $game['goals_h7'] && $game['goals_h7'] != -1) {
            $this->drawDel('table7', $game['home_id'], $game['away_id'], $game['goals_h7'], $game['goals_a7']);
        }
        //8
        if ($game['goals_h8'] > $game['goals_a8']) {
            $this->homeWinDel('table8', $game['home_id'], $game['away_id'], $game['goals_h8'], $game['goals_a8']);
        } elseif ($game['goals_a8'] > $game['goals_h8']) {
            $this->awayWinDel('table8', $game['home_id'], $game['away_id'], $game['goals_h8'], $game['goals_a8']);
        } elseif ($game['goals_a8'] == $game['goals_h8']) {
            $this->drawDel('table8', $game['home_id'], $game['away_id'], $game['goals_h8'], $game['goals_a8']);
        }
        //9
        if ($game['goals_h9'] > $game['goals_a9']) {
            $this->homeWinDel('table9', $game['home_id'], $game['away_id'], $game['goals_h9'], $game['goals_a9']);
        } elseif ($game['goals_a9'] > $game['goals_h9']) {
            $this->awayWinDel('table9', $game['home_id'], $game['away_id'], $game['goals_h9'], $game['goals_a9']);
        } elseif ($game['goals_a9'] == $game['goals_h9']) {
            $this->drawDel('table9', $game['home_id'], $game['away_id'], $game['goals_h9'], $game['goals_a9']);
        }
        //10
        if ($game['goals_h10'] > $game['goals_a10']) {
            $this->homeWinDel('table10', $game['home_id'], $game['away_id'], $game['goals_h10'], $game['goals_a10']);
        } elseif ($game['goals_a10'] > $game['goals_h10']) {
            $this->awayWinDel('table10', $game['home_id'], $game['away_id'], $game['goals_h10'], $game['goals_a10']);
        } elseif ($game['goals_a10'] == $game['goals_h10'] && $game['goals_h10'] != -1) {
            $this->drawDel('table10', $game['home_id'], $game['away_id'], $game['goals_h10'], $game['goals_a10']);
        }
        //11
        if ($game['goals_h11'] > $game['goals_a11']) {
            $this->homeWinDel('table11', $game['home_id'], $game['away_id'], $game['goals_h11'], $game['goals_a11']);
        } elseif ($game['goals_a11'] > $game['goals_h11']) {
            $this->awayWinDel('table11', $game['home_id'], $game['away_id'], $game['goals_h11'], $game['goals_a11']);
        } elseif ($game['goals_a11'] == $game['goals_h11'] && $game['goals_h11'] != -1) {
            $this->drawDel('table11', $game['home_id'], $game['away_id'], $game['goals_h11'], $game['goals_a11']);
        }

        $sql_del = "DELETE FROM results WHERE id = $id";
        $this->db->query($sql_del);
    }

    private function homeWinDel($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h = "UPDATE $table
        SET games_played = games_played - 1, games_won = games_won - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a, points = points - 3
        WHERE id = $home_id";
        $this->db->query($sql_h);

        $sql_a = "UPDATE $table
        SET games_played = games_played - 1, games_lost = games_lost - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h
        WHERE id = $away_id";
        $this->db->query($sql_a);
    }

    private function awayWinDel($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h1 = "UPDATE $table
        SET games_played = games_played - 1, games_lost = games_lost - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a
        WHERE id = $home_id";
        $this->db->query($sql_h1);

        $sql_a1 = "UPDATE $table
        SET games_played = games_played - 1, games_won = games_won - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h, points = points - 3
        WHERE id = $away_id";
        $this->db->query($sql_a1);
    }

    private function drawDel($table, $home_id, $away_id, $goals_h, $goals_a)
    {
        $sql_h2 = "UPDATE $table
        SET games_played = games_played - 1, games_drew = games_drew - 1,
        goals_scored = goals_scored - $goals_h, goals_conceded = goals_conceded - $goals_a, points = points - 1
        WHERE id = $home_id";
        $this->db->query($sql_h2);

        $sql_a2 = "UPDATE $table
        SET games_played = games_played - 1, games_drew = games_drew - 1,
        goals_scored = goals_scored - $goals_a, goals_conceded = goals_conceded - $goals_h, points = points - 1
        WHERE id = $away_id";
        $this->db->query($sql_a2);
    }

    public function getMaxMday()
    {
        $sql = "SELECT MAX(m_day) as mDay FROM matchpairs";
        $query = $this->db->query($sql);
        return $query->getRow();
    }

    public function getNumberOfMdaysPlayed()
    {
        $sql = "SELECT MAX(m_day) as mDay FROM results";
        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getCombinedTable($id)
    {
        $sql = "SELECT id, team_name,
        (SELECT games_played FROM table11 WHERE id=$id)
        + (SELECT games_played FROM table7 WHERE id=$id)
        + (SELECT games_played FROM table8 WHERE id=$id)
        + (SELECT games_played FROM table9 WHERE id=$id)
        + (SELECT games_played FROM table10 WHERE id=$id) AS gamesAll,
        (SELECT games_won FROM table11 WHERE id=$id)
        + (SELECT games_won FROM table7 WHERE id=$id)
        + (SELECT games_won FROM table8 WHERE id=$id)
        + (SELECT games_won FROM table9 WHERE id=$id)
        + (SELECT games_won FROM table10 WHERE id=$id) AS gamesWon,
        (SELECT games_drew FROM table11 WHERE id=$id)
        + (SELECT games_drew FROM table7 WHERE id=$id)
        + (SELECT games_drew FROM table8 WHERE id=$id)
        + (SELECT games_drew FROM table9 WHERE id=$id)
        + (SELECT games_drew FROM table10 WHERE id=$id) AS gamesDrew,
        (SELECT games_lost FROM table11 WHERE id=$id)
        + (SELECT games_lost FROM table7 WHERE id=$id)
        + (SELECT games_lost FROM table8 WHERE id=$id)
        + (SELECT games_lost FROM table9 WHERE id=$id)
        + (SELECT games_lost FROM table10 WHERE id=$id) AS gamesLost,
        (SELECT goals_scored FROM table11 WHERE id=$id)
        + (SELECT goals_scored FROM table7 WHERE id=$id)
        + (SELECT goals_scored FROM table8 WHERE id=$id)
        + (SELECT goals_scored FROM table9 WHERE id=$id)
        + (SELECT goals_scored FROM table10 WHERE id=$id) AS goalsFor,
        (SELECT goals_conceded FROM table11 WHERE id=$id)
        + (SELECT goals_conceded FROM table7 WHERE id=$id)
        + (SELECT goals_conceded FROM table8 WHERE id=$id)
        + (SELECT goals_conceded FROM table9 WHERE id=$id)
        + (SELECT goals_conceded FROM table10 WHERE id=$id) AS goalsAgg,
        (SELECT points FROM table11 WHERE id=$id)
        + (SELECT points FROM table7 WHERE id=$id)
        + (SELECT points FROM table8 WHERE id=$id)
        + (SELECT points FROM table9 WHERE id=$id)
        + (SELECT points FROM table10 WHERE id=$id) AS pointsAll
        FROM teams WHERE id=$id";

        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function getVisitors($type)
    {
        $last12hrs = time() - (60 * 60 * 12);
        $last6hrs = time() - (60 * 60 * 6);
        $last2hrs = time() - (60 * 60 * 2);
        switch ($type) {
            case 'all':
                $sql = "SELECT COUNT(*) AS vis FROM visitors";
                break;
            case 'allUnique':
                $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors";
                break;
            case 'mobile':
                $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE device='mobile'";
                break;
            case 'mobileUnique':
                $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE device='mobile'";
                break;
            case 'desktop':
                $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE device='desktop'";
                break;
            case 'desktopUnique':
                $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE device='desktop'";
                break;
            case 'last12hrsViews':
                $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE timestamp>$last12hrs";
                break;
            case 'last12hrsVisitors':
                $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE timestamp>$last12hrs";
                break;
            case 'last6hrsViews':
                $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE timestamp>$last6hrs";
                break;
            case 'last6hrsVisitors':
                $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE timestamp>$last6hrs";
                break;
            case 'last2hrsViews':
                $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE timestamp>$last2hrs";
                break;
            case 'last2hrsVisitors':
                $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE timestamp>$last2hrs";
                break;
        }

        $query = $this->db->query($sql);
        return ($query) ? $query->getRow() : array();
    }

    public function visitorListForCurrentYear()
    {
        $sql = "SELECT * FROM visitors ORDER BY id DESC";
        $query = $this->db->query($sql);
        $result = ($query) ? $query->getResult() : array();

        $visitors = [];
        foreach ($result as $v) {
            $visitors[] = (object) [
                'id' => $v->id,
                'role' => $v->role,
                'returnVisitor' => $v->return_visitor,
                'ip' => $v->ip,
                'device' => $v->device,
                'browser' => $v->browser,
                'browserVersion' => $v->browser_ver,
                'mobile' => $v->mobile,
                'platform' => $v->platform,
                'referral' => $v->referral,
                'agent' => $v->agent,
                'page' => $v->page,
                'date' => $v->date,
                'time' => $v->time,
                'timestamp' => $v->timestamp,
                'month' => date('M', $v->timestamp),
                'year' => date('Y', $v->timestamp),
            ];
        }

        $currentYear = date('Y', time());
        $year = [];
        //$vis = array_reverse($visitors);
        foreach ($visitors as $v) {
            if ($v->year == $currentYear) {
                switch ($v->month) {
                    case 'Jan':
                        $year['Januar'][] = $v;
                        break;
                    case 'Feb':
                        $year['Februar'][] = $v;
                        break;
                    case 'Mar':
                        $year['Mart'][] = $v;
                        break;
                    case 'Apr':
                        $year['April'][] = $v;
                        break;
                    case 'May':
                        $year['Maj'][] = $v;
                        break;
                    case 'Jun':
                        $year['Jun'][] = $v;
                        break;
                    case 'Jul':
                        $year['Jul'][] = $v;
                        break;
                    case 'Aug':
                        $year['Avgust'][] = $v;
                        break;
                    case 'Sep':
                        $year['Septembar'][] = $v;
                        break;
                    case 'Oct':
                        $year['Oktobar'][] = $v;
                        break;
                    case 'Nov':
                        $year['Novembar'][] = $v;
                        break;
                    case 'Dec':
                        $year['Decembar'][] = $v;
                        break;
                }
            }
        }
        return $year;
    }

    public function setVisitor($session)
    {
        $role = $session->role;
        $returnVisitor = $session->returnVisitor;
        $ip = $session->ip;
        $device = $session->device;
        $browser = $session->browser;
        $browserVer = $session->browserVer;
        $mobile = $session->mobile;
        $platform = $session->platform;
        $referral = $session->referral;
        $agent = $session->agent;
        $page = $session->page;
        $date = $session->date;
        $time = $session->time;
        $timestamp = $session->timestamp;

        $sql = "INSERT INTO visitors (
            role, return_visitor, ip, device, browser, browser_ver,
            mobile, platform, referral, agent, page, date, time, timestamp)
        VALUES (
            '$role', $returnVisitor, '$ip', '$device', '$browser', '$browserVer',
            '$mobile', '$platform', '$referral', '$agent', '$page', '$date','$time', $timestamp)";
        $this->db->query($sql);
    }

    public function getUser($user)
    {
        $sql = "SELECT * FROM users WHERE role = '$user'";
        $query = $this->db->query($sql);
        return $query->getRow();
    }

    public function updatePassword($userID, $newPass)
    {
        $sql = "UPDATE users SET password = '$newPass' WHERE id = $userID";
        $this->db->query($sql);
    }
}