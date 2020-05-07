<?php


namespace Controllers;


use Models\Articles\Article;
use View\View;

class ArticlesController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function view(int $id)
    {

        $article = Article::getById($id);
        if ($article === null) {
            $this->view -> renderHTML('errors/page_404.php',  [], 404);
            return;
        }
        $this->view -> renderHTML('list/single.php',  ['articles'=>$article]);
    }

    public function edit(int $id)
    {
        $article = Article::getById($id);
        if ($article === null) {
            $this->view -> renderHTML('errors/page_404.php',  [], 404);
            return;
        }
        $article->setName("Edit Name");
        $article->setText("Edit Text");

        $article->save();
    }
}