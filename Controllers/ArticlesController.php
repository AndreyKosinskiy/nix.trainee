<?php


namespace Controllers;


use Services\Db;
use View\View;

class ArticlesController
{
    private View $view;
    private Db $db;

    public function __construct()
    {
        $this->view = new View();
        $this->db = new Db();
    }

    public function view(int $id)
    {
        $sql = 'SELECT * FROM articles WHERE id = :id';
        $article = $this->db->query($sql, ['id' => $id]);
        if ($article === []) {
            require __DIR__ . '/../templates/page_404.php';
        }
        $this->view -> renderHTML('list/single.php',  ['articles'=>$article]);
    }
}