<?php


class MySql{


    private $serverName = 'localhost', $username = 'root', $password = '', $db_name = 'shop';
    protected $conn;

    public function __construct(){
        $this->conn = mysqli_connect($this->serverName, $this->username, $this->password, $this->db_name);
    }
}