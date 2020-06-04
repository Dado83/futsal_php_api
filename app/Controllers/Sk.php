<?php namespace App\Controllers;

class Sk extends BaseController
{

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new \App\Models\DBModel;
        if (get_cookie('role') != 'admin' && !$this->request->getUserAgent()->isRobot()) {
            $this->model->setVisitor($this->setSession());
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
            'page' => 'svet-kompjutera',
            'date' => date('d/m/y', time()) ?: 'NULL',
            'time' => date('H:i', time()) ?: 'NULL',
            'timestamp' => time(),
        ];
        $session->set($data);

        return $session;
    }

    public function index()
    {
        echo view('sktestplay');
    }

}