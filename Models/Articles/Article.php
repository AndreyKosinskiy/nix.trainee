<?php

namespace Models\Articles;
use Models\Users\User;

class Article
{

    private $author;
    private $text;
    private $title;

    public function __construct(User $author, string $text, string $title)
    {
        $this->author = $author;
        $this->text = $text;
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }
}