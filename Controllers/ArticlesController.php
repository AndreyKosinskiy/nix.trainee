<?php


namespace Controllers;


use Exceptions\NotFoundException;
use Models\Articles\Article;
use Models\Users\User;
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
            throw new NotFoundException();
        }
        $this->view -> renderHTML('list/single.php',  ['articles'=>$article]);
    }

    public function add() :void
    {
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName("Insert Title");
        $article->setText("Insert Text");

        $article->save();
    }

    public function edit(int $id) :void
    {
        $article = Article::getById($id);
        if ($article === null) {
            throw new NotFoundException();
        }
        $article->setName("Edit Name");
        $article->setText("Edit Text");

        $article->save();
    }
}