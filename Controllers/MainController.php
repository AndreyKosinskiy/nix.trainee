<?php

namespace Controllers;


use View\View;

class MainController
{

    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function main()
    {
        $articles = [
            ['title' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['title' => 'Статья 2', 'text' => 'Текст статьи 2'],
        ];
        $this->view->renderHTML('list/list.php', array('articles' => $articles));
    }

    public function sayHello(string $name)
    {
        echo 'Привет ' . $name;
    }
}