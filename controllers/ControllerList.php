<?php

require_once './models/ModelList.php';

    class ControllerList extends Controller
    {
        public function __construct()
        {
            $this->model = new ModelList();
            $this->view = new View();
        }


        function action_index($id = null)
        {

            $data = $this->model->get_data();
            $this->view->generate('./view/list/list.php', 'global_templates/layout.php', $data);
        }
    }
