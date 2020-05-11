<?php namespace App\Controllers;

class Sk extends BaseController
{

    private function setSession($role = '')
    {
        $sessionData = [
            'ip' => $this->input->ip_address(),
            'mobile' => $this->agent->mobile(),
            'robot' => $this->agent->robot(),
            'platform' => $this->agent->platform(),
            'browser' => $this->agent->browser(),
            'version' => $this->agent->version(),
            'userAgent' => $this->agent->agent_string(),
            'site' => 'sk',
        ];

        $sessionStartTime = time();
        $sessionData['startTime'] = $sessionStartTime;

        $cookie = get_cookie('visited');
        if ($cookie) {
            $sessionData['newVisitor'] = 0;
        } else {
            set_cookie('visited', '1', 60 * 60 * 24 * 30 * 4);
            $sessionData['newVisitor'] = 1;
        }

        $sessionData['role'] = $role;
        $this->session->set_userdata($sessionData);
    }

    public function index()
    {
        echo view('sktestplay');
    }

}