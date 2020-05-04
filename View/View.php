<?php

namespace View;

class View
{
    private string $templatePath;

    public function __construct(string $templatePathEndSplash = __DIR__ . "/../templates/global_templates/layout.php")
    {
        $this->templatePath = $templatePathEndSplash;
    }

    public function renderHTML(string $templateName, array $vars = [])
    {
        // Put tamplate in buffer for catch Exception when template will be render.
        extract($vars);
        ob_start();
        include $this->templatePath;
        $buffer = ob_get_contents();
        ob_end_clean();

        if (empty($error)) {
            echo $buffer;
        } else {
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:' . $host . '404');
            return;
        }

    }
}