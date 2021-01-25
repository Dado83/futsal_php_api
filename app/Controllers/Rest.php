<?php namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Psr\Log\LoggerInterface;

class Rest extends ResourceController
{

    /* private $modelName = '';
    protected $format = 'json'; */

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->db = new \App\Models\RestModel;
        //ubaciti setsession()
    }

    //napraviti setsession()

    public function index()
    {
        $data = ['erer', 'aaa', 4, 7, 'a'];
        return $this->respond($data);
    }

    public function info()
    {
        $data = $this->db->getTeams();
        return $this->respond($data);
    }
}