<?php namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Psr\Log\LoggerInterface;

class Rest extends ResourceController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->db = new \App\Models\DBModel;
        //use setsession()
    }

    //create setsession()

    //not needed f?...
    public function index()
    {
        $data = ['erer', 'aaa', 4, 7, 'a'];
        return $this->respond($data);
    }

    public function getTeams($id = 12)
    {
        $data = $this->db->getTeams($id);
        return $this->respond($data);
    }

    public function getTable($table, $isShortName = false, $id1 = 12, $id2 = 13, $id3 = 14, $id4 = 15)
    {
        $data = $this->db->getTable($table, $isShortName, $id1, $id2, $id3, $id4);
        return $this->respond($data);
    }

    public function getTeamByTablePos($table, $pos, $id = 12)
    {
        $data = $this->db->getTeamByTablePos($table, $pos, $id);
        return $this->respond($data);
    }

    public function getTeamByID($id)
    {
        $data = $this->db->getTeamByID($id);
        return $this->respond($data);
    }

    public function getResultsByID($id)
    {
        $data = $this->db->getResultsByID($id);
        return $this->respond($data);
    }

    public function checkForResult($home, $away)
    {
        $data = $this->db->checkForResult($home, $away);
        return $this->respond($data);
    }

    public function getMatchPairs($mday, $id = 12)
    {
        $data = $this->db->getMatchPairs($mday, $id);
        return $this->respond($data);
    }

    public function getAllMatchPairs($id = 12)
    {
        $data = $this->db->getAllMatchPairs($id);
        return $this->respond($data);
    }

    public function getMatchPairsByTeam($id, $mday = 0)
    {
        $data = $this->db->getMatchPairsByTeam($id, $mday);
        return $this->respond($data);
    }

    public function getMatchDates($mday, $pairNotToShow = 12)
    {
        $data = $this->db->getMatchDates($mday, $pairNotToShow);
        return $this->respond($data);
    }

    public function getMatchPairsNotPlayed($id = 12)
    {
        $data = $this->db->getMatchPairsNotPlayed($id);
        return $this->respond($data);
    }

    public function getResults()
    {
        $data = $this->db->getResults();
        return $this->respond($data);
    }

    public function getResultsByMday($mday)
    {
        $data = $this->db->getResultsByMday($mday);
        return $this->respond($data);
    }

    public function getNextFixture($pairNotToShow = 12)
    {
        $data = $this->db->getNextFixture($pairNotToShow);
        return $this->respond($data);
    }

    public function getGameByID($id)
    {
        $data = $this->db->getGameByID($id);
        return $this->respond($data);
    }

    public function getGameFromResults($id)
    {
        $data = $this->db->getGameFromResults($id);
        return $this->respond($data);
    }

    public function getMatchPair($home, $away)
    {
        $data = $this->db->getMatchPair($home, $away);
        return $this->respond($data);
    }

    public function getNextGameDate($mday)
    {
        $data = $this->db->getNextGameDate($mday);
        return $this->respond($data);
    }

    public function getNotPlaying($mday = 0)
    {
        $data = $this->db->getNotPlaying($mday);
        return $this->respond($data);
    }

    public function setPlayed($id, $isPlayed)
    {
        $this->db->setPlayed($id, $isPlayed);
    }

    public function insertGame($mday, $home, $home_id, $away, $away_id,
        $goals_h7, $goals_a7,
        $goals_h8, $goals_a8,
        $goals_h9, $goals_a9,
        $goals_h10, $goals_a10,
        $goals_h11, $goals_a11) {

        $this->db->insertGame($mday, $home, $home_id, $away, $away_id,
            $goals_h7, $goals_a7,
            $goals_h8, $goals_a8,
            $goals_h9, $goals_a9,
            $goals_h10, $goals_a10,
            $goals_h11, $goals_a11);
    }

    public function deleteGame($id)
    {
        $this->db->deleteGame($id);
    }

    public function getMaxMday()
    {
        $data = $this->db->getMaxMday();
        return $this->respond($data);
    }

    public function getNumberOfMdaysPlayed()
    {
        $data = $this->db->getNumberOfMdaysPlayed();
        return $this->respond($data);
    }

    public function getCombinedTable($id)
    {
        $data = $this->db->getCombinedTable($id);
        return $this->respond($data);
    }

    public function getVisitors($type)
    {
        $data = $this->db->getVisitors($type);
        return $this->respond($data);
    }

    public function visitorListForCurrentYear()
    {
        $data = $this->db->visitorListForCurrentYear();
        return $this->respond($data);
    }

    public function setVisitor($session)
    {
        $this->db->setVisitor($session);
    }

    public function getUser($user)
    {
        $data = $this->db->getUser($user);
        return $this->respond($data);
    }

    public function updatePassword($userID, $newPass)
    {
        $this->db->updatePassword($userID, $newPass);
    }
}