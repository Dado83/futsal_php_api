<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");

class DB
{
    private $host;
    private $database;
    private $username;
    private $password;
    private $mysqli;

    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

    }

    public function info()
    {
        echo json_encode($this->host . ' ' . $this->password . ' ' . $this->username . ' ' . $this->database);
    }

    public function DBconnect()
    {
        $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
    }

    public function select($id)
    {
        $result = $this->mysqli->query("SELECT * FROM teams WHERE id=$id");
        echo json_encode($result->fetch_object());
    }
}

/* $db = new DB('localhost', 'root', '', 'futsal');
$db->DBconnect();
$id = $_GET['id']; */
//echo $id;
//$db->select($id);