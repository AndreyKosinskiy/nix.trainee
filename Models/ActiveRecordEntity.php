<?php

namespace Models;

use Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderScore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        } else {
            $this->insert($mappedProperties);
        }
    }

    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [];
        foreach ($mappedProperties as $column => $value) {
            $columns2params[] = "$column = :$column";
            $params2values[":$column"] = $value;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id=' . $this->id;
        print($sql);
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }

    private function insert(array $mappedProperties): void
    {
        $filteredProperties = array_filter($mappedProperties);
        var_dump($filteredProperties);

        $columns2params = [];
        $params2values = [];
        foreach ($filteredProperties as $column => $value) {
            $columns2params[] = "$column";
            $params2values[":$column"] = $value;
        }

        $sql = 'INSERT INTO ' . static::getTableName().'(' . implode(", ", $columns2params) . ')' . ' VALUES (:' . implode(', :', $columns2params) . ')';
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertId();
    }

    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderScore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }
        return $mappedProperties;
    }

    public static function findAll(): ?array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM ' . static::getTableName(), [], static::class);
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM ' . static::getTableName() . ' WHERE id=:id',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    abstract protected static function getTableName(): string;

}