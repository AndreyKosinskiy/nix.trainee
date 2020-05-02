<?php

require_once './models/ModelProfile.php';

class ControllerProfile extends Controller
    {
        public function __construct()
        {
            $this->model = new ModelProfile();
            $this->view = new View();
        }

        function action_index($id = 1)
        {
            $data = $this->model->get_data_by_id($id);
            //$data = $this->model->get_data();
            $this->view->generate('view/profile/profile.php', 'global_templates/layout.php', $data);
        }
    }
