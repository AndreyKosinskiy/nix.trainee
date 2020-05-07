<?php
namespace Services;

class Db
{
    private $pdo;

    public function __construct()
    {
        $dbOptions = (require __DIR__.'/../config.php')['db'];

        $this->pdo = new \PDO(
            'mysql:host='. $dbOptions['host'] .';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $stm =$this->pdo->prepare($sql);
        $result = $stm->execute($params);

        if (false === $result){
            return null;
        }
        return $stm->fetchAll(\PDO::FETCH_CLASS, $className);
    }

}