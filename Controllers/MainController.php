<?php

namespace Controllers;

use Models\Articles\Article;
use Services\Db;
use View\View;

class MainController
{

    private View $view;
    private Db $db;

    public function __construct()
    {
        $this->view = new View();
        $this->db = new Db();
    }

    public function main()
    {

        $articles = [
            ['title' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['title' => 'Статья 2', 'text' => 'Текст статьи 2'],
        ];
        $sql = 'SELECT * FROM articles';
        $articles = $this->db->query($sql,[],Article::class);
        $this->view->renderHTML('list/list.php', array('articles' => $articles));
    }

    public function sayHello(string $name)
    {
        echo 'Привет ' . $name;
    }
}