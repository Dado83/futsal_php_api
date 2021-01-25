<?php namespace App\Models;

use CodeIgniter\Model;

class RestModel extends Model
{
    public function getTeams($id = 12)
    {
        $sql = "SELECT * FROM teams WHERE NOT id = $id";
        $query = $this->db->query($sql);
        return ($query) ? $query->getResult() : array();
    }
}