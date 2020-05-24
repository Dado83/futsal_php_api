<?php namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        $data['teams'] = $this->model->getTeams();

        echo view('header');
        echo view('front-page', $data);
        echo view('footer');
    }

    public function table()
    {
        $data['table6'] = $this->model->getTable('table6', true);
        $data['table7'] = $this->model->getTable('table7', true, 8);
        $data['table8'] = $this->model->getTable('table8', true);
        $data['table9'] = $this->model->getTable('table9', true);
        $data['table10'] = $this->model->getTable('table10', true, 7, 1);

        echo view('header');
        echo view('table', $data);
        echo view('footer');
    }

    public function team($id)
    {
        $data['team'] = $this->model->getTeamByID($id);
        $data['results6'] = $this->model->getResultsByID('results6', $id);
        $data['results7'] = $this->model->getResultsByID('results7', $id);
        $data['results8'] = $this->model->getResultsByID('results8', $id);
        $data['results9'] = $this->model->getResultsByID('results9', $id);
        $data['results10'] = $this->model->getResultsByID('results10', $id);

        echo view('header');
        echo view('team', $data);
        echo view('footer');
    }

    public function fixtures()
    {
        $maxMDay = $this->model->getMaxMday()->mDay;
        for ($i = 1; $i <= $maxMDay; $i++) {
            $data['fixtures'][$i] = $this->model->getMatchPairs($i);
        }
        echo view('header');
        echo view('fixtures', $data);
        echo view('footer');
    }

    public function getMatchPairsNotPlayed()
    {
        $data = $this->model->getMatchPairsNotPlayed();
        return $this->response->setJSON($data);
    }

    public function results()
    {
        $maxMDay = $this->model->getMaxMday()->mDay;

        for ($i = 1; $i <= $maxMDay; $i++) {
            $data['results6'][$i] = $this->model->getResults('results6', $i);
            $data['results7'][$i] = $this->model->getResults('results7', $i);
            $data['results8'][$i] = $this->model->getResults('results8', $i);
            $data['results9'][$i] = $this->model->getResults('results9', $i);
            $data['results10'][$i] = $this->model->getResults('results10', $i);
        }

        $maxMDay = $this->model->getMaxMday()->mDay;
        for ($i = 1; $i <= $maxMDay; $i++) {
            $data['dates'][$i] = $this->model->getMatchPairs($i);
        }

        echo view('header');
        echo view('results', $data);
        echo view('footer');
    }

    public function about()
    {
        echo view('header');
        echo view('about');
        echo view('footer');
    }

    public function createTournament()
    {
        echo view('fts.html');
    }

    public function admin()
    {
        $data['results'] = $this->model->getResults();
        $data['matchPairs'] = $this->model->getMatchPairsNotPlayed();

        echo view('header');
        echo view('admin', $data);
        echo view('footer');

    }

    public function formIn($id)
    {

        $data['title'] = 'Unos kola';
        $data['game'] = $this->model->getGameByID($id);

        echo view('header', $data);
        echo view('gameInput', $data);
    }

    public function unosKola()
    {

        $request = service('request');

        $id = $request->getVar('id');
        $mDay = $request->getVar('mday');

        $home = $request->getVar('home');
        $away = $request->getVar('away');
        $homeID = $request->getVar('homeID');
        $awayID = $request->getVar('awayID');

        $home10 = $request->getVar('home10');
        $away10 = $request->getVar('away10');
        $home9 = $request->getVar('home9');
        $away9 = $request->getVar('away9');
        $home8 = $request->getVar('home8');
        $away8 = $request->getVar('away8');
        $home7 = $request->getVar('home7');
        $away7 = $request->getVar('away7');
        $home6 = $request->getVar('home6');
        $away6 = $request->getVar('away6');

        $this->model->insertGame($mDay, $home, $homeID, $away, $awayID,
            $home7, $away7,
            $home8, $away8,
            $home9, $away9,
            $home10, $away10,
            $home6, $away6);

        $this->model->setPlayed($id, true);

        /* $data['results'] = $this->model->getResults();
        $data['matchPairs'] = $this->model->getMatchPairsNotPlayed(); */
        return redirect()->to('admin');
    }

    public function brisanjeKola($id)
    {

        $data['matchPairs'] = $this->model->getMatchPairsNotPlayed();
        $data['results'] = $this->model->getAllResults('results6');

        $game = $this->model->getGameFromResults($id);
        $game7 = $this->model->getGameBySel('results7', $game->home_teamid, $game->away_teamid);
        $game10 = $this->model->getGameBySel('results10', $game->home_teamid, $game->away_teamid);

        $matchPair = $this->model->getMatchPair($game->home_teamid, $game->away_teamid);

        $this->model->setPlayed($matchPair->id, 'FALSE');

        $this->model->deleteGame('results6', 'table6', $id);
        $this->model->deleteGame('results8', 'table8', $id);
        $this->model->deleteGame('results9', 'table9', $id);
        if ($game7 != 'NULL') {
            $this->model->deleteGame('results7', 'table7', $game7->id);
        }
        if ($game10 != 'NULL') {
            $this->model->deleteGame('results10', 'table10', $game10->id);
        }

        return redirect()->to('admin');
    }

    public function newsLetter()
    {
        $data['title'] = 'Bilten';
        $data['teams'] = $this->model->getTeams();
        $data['table6'] = $this->model->getTable('table6');
        $data['table7'] = $this->model->getTable('table7', false, 8);
        $data['table8'] = $this->model->getTable('table8');
        $data['table9'] = $this->model->getTable('table9');
        $data['table10'] = $this->model->getTable('table10', false, 7, 1);
        $data['results6'] = $this->model->getLastResults('results6')['results'];
        $data['results7'] = $this->model->getLastResults('results7')['results'];
        $data['results8'] = $this->model->getLastResults('results8')['results'];
        $data['results9'] = $this->model->getLastResults('results9')['results'];
        $data['results10'] = $this->model->getLastResults('results10')['results'];
        $data['lastMday'] = $this->model->getLastResults('results6')['lastMday'];
        $data['nextFixture'] = $this->model->getNextFixture();
        $data['nextMday'] = $data['lastMday'] + 1;
        $data['notPlaying'] = $this->model->getNotPlaying($data['lastMday'] + 1);
        $data['notPlayingLastMday'] = $this->model->getNotPlaying($data['lastMday']);
        $data['nextGameDate'] = $this->model->getNextGameDate($data['nextMday']);
        $maxMday = $this->model->getMaxMday();
        $data['isLeagueOver'] = $data['lastMday'] == $maxMday->mDay;

        echo view('newsletter', $data);
    }

    public function metrics()
    {
        $data['title'] = 'Metrics';
        $data['vis'] = $this->model->visitorListForCurrentYear();
        echo view('metrics', $data);

    }
    public function getVisitorData()
    {

        $data['visAll'] = $this->model->getVisitors('all');
        $data['visUni'] = $this->model->getVisitors('allUnique');
        $data['visDesk'] = $this->model->getVisitors('desktop');
        $data['visDeskUni'] = $this->model->getVisitors('desktopUnique');
        $data['visMob'] = $this->model->getVisitors('mobile');
        $data['visMobUni'] = $this->model->getVisitors('mobileUnique');
        $data['visRob'] = $this->model->getVisitors('robot');
        $data['visRobUni'] = $this->model->getVisitors('robotUnique');
        $data['visitorList'] = $this->model->visitorListForCurrentYear();

        echo json_encode($data);
    }

    public function test()
    {
        $data = $this->model->getGameByID(20);

        $home = -1;
        $away = 0;

        if (5 > 2 && 0 == 0 || 1 == 2) {
            echo 'test';
        }
    }
}