<?php

class ControllerMain extends Controller
{

    function action_index($id = null)
    {
        $this->view->generate('', 'global_templates/layout.php');
    }
}
