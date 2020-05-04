<?php
namespace Controllers;


class MainController
{
    public function main()
    {
        echo 'Главная';
    }

    public function sayHello(string $name)
    {
        echo 'Привет ' . $name;
    }
}