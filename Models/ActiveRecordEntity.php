<?php
namespace Models;

use Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId() :int
    {
        return $this->id;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_','',ucwords($source,'_')));
    }

    public static function findAll(): array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM articles;',[],static::class);
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
         $entities = $db->query(
             'SELECT * FROM ' . static::getTableName() . 'WHERE id=:id',
             [':id' => $id],
             static::class
         );
         return $entities ? $entities[0] : null;
    }
    abstract protected static function getTableName() :string;

}