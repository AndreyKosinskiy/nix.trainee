<?php

namespace Controllers;

use Models\Articles\Article;
use Services\Db;
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
        $articles = Article::findAll();
        $this->view->renderHTML('list/list.php', array('articles' => $articles));
    }
}