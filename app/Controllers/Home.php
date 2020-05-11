<?php namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('home');
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
        echo view('header');
        echo view('results', $data);
        echo view('footer');
    }

    public function getLastResults($results)
    {
        $data = $this->model->getLastResults($results);
        return $this->response->setJSON($data);
    }

    public function getNextFixture()
    {
        $data = $this->model->getNextFixture();
        return $this->response->setJSON($data);
    }

//????????????
    public function setVisitor($role = 'NULL')
    {
        $data = $this->model->setVisitor();
        return $this->response->setJSON($data);
    }

    public function visitorListForCurrentYear()
    {
        $data = $this->model->visitorListForCurrentYear();
        return $this->response->setJSON($data);
    }

    public function test()
    {
        echo 'test jebeni';
    }

}