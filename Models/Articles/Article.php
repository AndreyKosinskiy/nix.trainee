<?php

namespace Models\Articles;


use Models\ActiveRecordEntity;
use Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected int $authorId;
    protected string $text;
    protected string $name;
    protected  $createdAt;

    public function getName() :string
    {
        return $this->name;
    }

    public function getText() :string
    {
        return $this->text;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function setText($value)
    {
        $this->text = $value;
    }

    protected static function getTableName() :string
    {
        return 'articles';
    }

    public function getAuthor() :User
    {
        return User::getById($this->authorId);
    }

}