<?php
class dbconfig
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'negro';
    private $database = 'scandiweb';
    protected $conn;
    public function __construct()
    {
        if (!isset($this->conn)) {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            if (!$this->conn) {
                echo 'Fatal Error: Cannot connect to database server';
                exit;
            }
        }
        return $this->conn;
    }
}
