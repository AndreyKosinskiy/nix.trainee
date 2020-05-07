<?php

namespace Models\Articles;
use Models\Users\User;

class Article
{
    private int $id;
    private int $authorId;
    private string $text;
    private string $title;
    private  $createAt;

    public function __set($name,$value)
    {
        $camelCaseName = $this-> underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    public function getId() :int
    {
        return $this->id;
    }

    public function getName() :string
    {
        return $this->name;
    }

    public function getText() :string
    {
        return $this->text;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_','',ucwords($source,'_')));
    }

}