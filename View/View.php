<?php

namespace View;

class View
{
    private string $templatePath;

    public function __construct(string $templatePathEndSplash = __DIR__ . "/../templates/global_templates/layout.php")
    {
        $this->templatePath = $templatePathEndSplash;
    }

    public function renderHTML(string $templateName, array $vars = [], $code = 200)
    {
        // Put template in buffer for catch Exception when template will be render.
        http_response_code($code);
        extract($vars);
        ob_start();
        include $this->templatePath;
        $buffer = ob_get_contents();
        ob_end_clean();
        echo $buffer;
    }
}