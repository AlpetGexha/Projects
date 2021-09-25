<?php
setlocale(LC_TIME, array('al_AL.UTF-8', 'al_AL@euro', 'al_AL', 'Albanian'));

class DB
{
    private $server = 'mysql:host=localhost;dbname=ag_blogpost';

    private $user = 'root';

    private $pass = '';

    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    protected $db;

    public function openDB()
    {
        try {
            $this->db = new PDO($this->server, $this->user, $this->pass, $this->options);

            return $this->db;
        } catch (PDOException $e) {
            echo 'Problem me databazen: ' . $e->getMessage();
        }
    }

    public function closedbnection()
    {
        $this->db = null;
    }
}
