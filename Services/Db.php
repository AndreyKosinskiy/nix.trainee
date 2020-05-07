<?php

namespace Services;

class Db
{
    private $pdo;
    private static $instance;

    private function __construct()
    {
        $dbOptions = (require __DIR__ . '/../config.php')['db'];

        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
    }

    public static function getInstance() :self
    {
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $stm = $this->pdo->prepare($sql);
        $result = $stm->execute($params);

        if (false === $result) {
            return null;
        }

        return $stm->fetchAll(\PDO::FETCH_CLASS, $className);
    }



}