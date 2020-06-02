<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Models\DBModel;
use CodeIgniter\Controller;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['cookie'];

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        //$this->session = \Config\Services::session();
        $this->model = new \App\Models\DBModel;
        $this->model->setVisitor($this->setSession());
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
        if ($agent->isRobot()) {
            $device = 'robot';
        } elseif ($agent->isMobile()) {
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
            'page' => uri_string() ?: 'NULL',
            'date' => date('d/m/y', time()) ?: 'NULL',
            'time' => date('H:i', time()) ?: 'NULL',
        ];
        $session->set($data);

        return $session;
    }

}