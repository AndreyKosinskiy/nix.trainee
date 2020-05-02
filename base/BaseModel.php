<?php

class Model
{
    public $config;
    public $db;

    function __construct()
    {
        $this->config = require_once './config.php';
        $host = $this->config['host'];
        $dbname = $this->config['dbname'];
        $username = $this->config['username'];
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_PERSISTENT => true,
        ];
        $pass = $this->config['pass'];
        $charset = 'utf8';
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $pass, $opt);
        }catch(Exception $e){
            print($e->getMessage());
        }
    }

    public function get_data()
    {
        //rewrite in child
    }
}