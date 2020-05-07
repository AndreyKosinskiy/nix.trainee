<?php

namespace Models\Articles;


use Models\ActiveRecordEntity;
use Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected int $authorId;
    protected string $text;
    protected string $title;
    protected  $createAt;

    public function getName() :string
    {
        return $this->name;
    }

    public function getText() :string
    {
        return $this->text;
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