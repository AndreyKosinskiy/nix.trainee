<?php

require_once 'BaseView.php';
class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    function action_index($id=null)
    {
        //rewrite in child
    }
}