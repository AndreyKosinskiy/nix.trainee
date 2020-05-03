<?php

class Article
{

    private $author;
    private $text;
    private $title;

    public function __construct(string $author, string $text, string $title)
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
    public function getAuthor(): string
    {
        return $this->author;
    }
}