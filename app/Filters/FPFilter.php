<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FPFilter implements FilterInterface
{

    public function before(RequestInterface $request)
    {
        $session = session();
        if ($session->role != 'admin') {
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {

    }
}