<?php namespace App\Controllers;

class Home extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new \App\Models\DBModel;
        $session = $this->setSession();
        if (get_cookie('role') != 'admin' && !$this->request->getUserAgent()->isRobot()) {
            $this->model->setVisitor($session);
        }
    }

    private function setSession()
    {
        $session = session();
        if (get_cookie('role') == 'admin') {
            $role = 'admin';
        } else {
            $role = 'NULL';
        }
        if (get_cookie('visit') == '1') {
            $visitor = '1';
        } else {
            set_cookie('visit', '1', 60 * 60 * 24 * 30 * 3);
            $visitor = '0';
        }
        $agent = $this->request->getUserAgent();
        if ($agent->isMobile()) {
            $device = 'mobile';
        } else {
            $device = 'desktop';
        }
        $data = [
            'role' => $role,
            'returnVisitor' => $visitor ?: 'NULL',
            'ip' => $this->request->getIPAddress() ?: 'NULL',
            'device' => $device ?: 'NULL',
            'browser' => $agent->getBrowser() ?: 'NULL',
            'browserVer' => $agent->getVersion() ?: 'NULL',
            'mobile' => $agent->getMobile() ?: 'NULL',
            'platform' => $agent->getPlatform() ?: 'NULL',
            'referral' => $agent->getReferrer() ?: 'NULL',
            'agent' => $agent->getAgentString() ?: 'NULL',
            'page' => uri_string() == '/' ? 'fairplay2014' : uri_string(),
            'date' => date('d/m/y', time()) ?: 'NULL',
            'time' => date('H:i', time()) ?: 'NULL',
            'timestamp' => time(),
            'lastHourViews' => $this->model->getVisitors('lastHourViews'),
            'lastHourVisitors' => $this->model->getVisitors('lastHourVisitors'),
        ];
        $session->set($data);

        return $session;
    }

    public function index()
    {
        $data['title'] = 'Fair Play LBŠ';
        $data['maxMday'] = $this->model->getMaxMday()->mDay;
        $data['lastMday'] = $this->model->getNumberOfMdaysPlayed()->mDay;
        if ($data['lastMday'] != null) {
            $data['lastResults'] = $this->model->getResultsByMday($data['lastMday']);
        }
        $data['startDate'] = $this->model->getMatchDates(1)->game_date;
        $data['nextFixture'] = $this->model->getNextFixture(); //izbacit arg ako bude 10 ekipa

        echo view('header', $data);
        echo view('front-page', $data);
        echo view('footer');
    }

    public function table()
    {
        $data['title'] = 'LBŠ tabela';
        //ukoliko ne bude 10 ekipa ubacit arg 10
        $data['table7'] = $this->model->getTable('table7', true, 10, 5, 8, 9);
        $data['table8'] = $this->model->getTable('table8', true);
        $data['table9'] = $this->model->getTable('table9', true);
        $data['table10'] = $this->model->getTable('table10', true);
        $data['table11'] = $this->model->getTable('table11', true, 4);

        echo view('header', $data);
        echo view('table', $data);
        echo view('footer');
    }

    public function teams()
    {
        $data['title'] = 'LBŠ učesnici';
        //ako bude 9 ucesnika ubacit arg 10
        $data['teams'] = $this->model->getTeams();

        echo view('header', $data);
        echo view('teams', $data);
        echo view('footer');
    }

    public function team($id)
    {
        $data['title'] = $this->model->getTeamByID($id)->team_name;
        $data['team'] = $this->model->getTeamByID($id);
        $data['results'] = $this->model->getResultsByID($id);

        echo view('header', $data);
        echo view('team', $data);
        echo view('footer');
    }

    public function fixtures()
    {
        $data['title'] = 'LBŠ raspored';
        $maxMDay = $this->model->getMaxMday()->mDay;
        for ($i = 1; $i <= $maxMDay; $i++) {
            //ubacit arg 10 ako je 9 ekipa
            $data['fixtures'][$i] = $this->model->getMatchPairs($i);
        }
        echo view('header', $data);
        echo view('fixtures', $data);
        echo view('footer');
    }

    public function results()
    {
        $data['title'] = 'LBŠ rezultati';
        $maxMDay = $this->model->getNumberOfMdaysPlayed()->mDay;

        for ($i = 1; $i <= $maxMDay; $i++) {
            $data['results'][$i] = $this->model->getResultsByMday($i);
        }

        $maxMDay = $this->model->getMaxMday()->mDay;
        for ($i = 1; $i <= $maxMDay; $i++) {
            $data['dates'][$i] = $this->model->getMatchPairs($i);
        }

        echo view('header', $data);
        echo view('results', $data);
        echo view('footer');
    }

    public function finalFour()
    {
        $data['title'] = ' LBŠ Završnica';
        //ubaciti arg ako bude 9 ekipa
        for ($i = 1; $i <= 4; $i++) {
            $data['finals7'][$i] = $this->model->getTeamByTablePos('table7', $i);
            $data['finals8'][$i] = $this->model->getTeamByTablePos('table8', $i);
            $data['finals9'][$i] = $this->model->getTeamByTablePos('table9', $i);
            $data['finals10'][$i] = $this->model->getTeamByTablePos('table10', $i);
            $data['finals11'][$i] = $this->model->getTeamByTablePos('table11', $i);
        }
        $data['combinedTable'] = $this->getCombinedTable();

        echo view('header', $data);
        echo view('final-four', $data);
        echo view('footer');
    }

    private function getCombinedTable()
    {
        $t1 = $this->model->getCombinedTable(1);
        $t2 = $this->model->getCombinedTable(2);
        $t3 = $this->model->getCombinedTable(3);
        $t4 = $this->model->getCombinedTable(4);
        $t5 = $this->model->getCombinedTable(5);
        $t6 = $this->model->getCombinedTable(6);
        $t7 = $this->model->getCombinedTable(7);
        $t8 = $this->model->getCombinedTable(8);
        $t9 = $this->model->getCombinedTable(9);
        $total = array($t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9);
        usort($total, array($this, 'sortByPoints'));

        return $total;
    }

    private function sortByPoints($a, $b)
    {
        if ($a->pointsAll == $b->pointsAll) {
            return 0;
        }
        return ($a->pointsAll > $b->pointsAll) ? -1 : 1;
    }

    public function about()
    {
        $data['title'] = 'Fair Play LBŠ';
        echo view('header', $data);
        echo view('about');
        echo view('footer');
    }

    public function createTournament()
    {
        $data['title'] = 'Pravljenje rasporeda';
        echo view('header', $data);
        echo view('fts.html');
        echo view('footer');
    }

    public function admin()
    {
        $data['title'] = 'LBŠ admin';
        $data['results'] = $this->model->getResults();
        //ubaciti arg 10 ako bude 9 ekipa
        $data['matchPairs'] = $this->model->getMatchPairsNotPlayed();

        echo view('header', $data);
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

    public function inputGame()
    {
        $request = $this->request;

        $id = $request->getVar('id');
        $mDay = $request->getVar('mday');

        $home = $request->getVar('home');
        $away = $request->getVar('away');
        $homeID = $request->getVar('homeID');
        $awayID = $request->getVar('awayID');

        $home11 = $request->getVar('home11');
        $away11 = $request->getVar('away11');
        $home10 = $request->getVar('home10');
        $away10 = $request->getVar('away10');
        $home9 = $request->getVar('home9');
        $away9 = $request->getVar('away9');
        $home8 = $request->getVar('home8');
        $away8 = $request->getVar('away8');
        $home7 = $request->getVar('home7');
        $away7 = $request->getVar('away7');

        if (!$this->model->checkForResult($homeID, $awayID)) {
            $this->model->insertGame($mDay, $home, $homeID, $away, $awayID,
                $home7, $away7,
                $home8, $away8,
                $home9, $away9,
                $home10, $away10,
                $home11, $away11);
            $this->model->setPlayed($id, true);
        }

        return redirect()->to('/admin');
    }

    public function deleteGame($id)
    {
        $game = $this->model->getGameFromResults($id);
        $matchPair = $this->model->getMatchPair($game->home_id, $game->away_id);
        $this->model->setPlayed($matchPair->id, 'FALSE');

        $this->model->deleteGame($id);

        return redirect()->to('/admin');
    }

    public function newsLetter() //provjerit

    {
        $data['title'] = 'Bilten';
        $data['teams'] = $this->model->getTeams();
        $data['table7'] = $this->model->getTable('table7', false, 5, 8, 9, 10);
        $data['table8'] = $this->model->getTable('table8');
        $data['table9'] = $this->model->getTable('table9');
        $data['table10'] = $this->model->getTable('table10');
        $data['table11'] = $this->model->getTable('table11', false, 4);

        $data['lastMday'] = $this->model->getNumberOfMdaysPlayed()->mDay;
        $data['results'] = $this->model->getResultsByMday($data['lastMday']);

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

        echo view('header', $data);
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

    public function login()
    {
        $data['title'] = 'LBŠ login';
        echo view('header', $data);
        echo view('login');
        echo view('footer');
    }

    public function userLogin()
    {
        $session = session();
        $request = $this->request;
        $userRole = $request->getVar('userRole');
        $userPass = $request->getVar('userPassword');
        $dbUser = $this->model->getUser($userRole);
        if ($dbUser) {
            $dbRole = $dbUser->role;
            $dbPass = $dbUser->password;
            if (!password_verify($userPass, $dbPass)) {
                $session->setTempdata('info', 'Lozinka netacna', 1);
                return redirect()->to('/admin');
            } else {
                $session->set('role', $dbRole);
                return redirect()->to('/admin')->setCookie('role', 'admin', 60 * 60 * 24 * 30 * 3);
            }
        } else {
            $session->setTempdata('info', 'Korisnik nije u bazi', 1);
            return redirect()->to('/admin');
        }
    }

    public function test()
    {
        echo view('test.html');
    }
}