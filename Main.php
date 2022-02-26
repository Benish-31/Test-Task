<?php
include_once 'dbconfig.php';

class Main extends dbconfig
{
    public function __construct()
    {
        parent::__construct();
    }

    public function retrieveData($query)
    {
        $result = $this->conn->query($query);
        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($res = $result->fetch_assoc()) {
            $rows[] = $res;
        }

        return $rows;
    }

    public function execute($query)
    {
        $result = $this->conn->query($query);
        if ($result == false) {
            echo 'Fatal Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }

    public function delete_data($id, $table)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->conn->query($query);
        if ($result == true) {
            return true;
        } else {
            echo 'Fatal Error: cannot delete id ' . $id . ' from table ' . $table;

            return false;
        }
    }

    public function escape_string($value)
    {
        return $this->conn->real_escape_string($value);
    }
}
