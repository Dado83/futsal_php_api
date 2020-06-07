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
        $data['lastResults'] = $this->model->getResultsByMday($data['lastMday']);
        $data['nextFixture'] = $this->model->getNextFixture();

        echo view('header', $data);
        echo view('front-page', $data);
        echo view('footer');
    }

    public function table()
    {
        $data['title'] = 'LBŠ tabela';
        $data['table6'] = $this->model->getTable('table6', true);
        $data['table7'] = $this->model->getTable('table7', true, 8);
        $data['table8'] = $this->model->getTable('table8', true);
        $data['table9'] = $this->model->getTable('table9', true);
        $data['table10'] = $this->model->getTable('table10', true, 7, 1);

        echo view('header', $data);
        echo view('table', $data);
        echo view('footer');
    }

    public function teams()
    {
        $data['title'] = 'LBŠ učesnici';
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

        echo view('header', $data);
        echo view('final-four', $data);
        echo view('footer');
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
        var_dump(date('F'));
        echo '<br>';
        echo time();
        echo '<br>';
        echo strtotime('13:33');
        echo '<br>';
        echo (session()->lastHourViews->vis);
    }
}