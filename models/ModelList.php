<?php

require_once './base/BaseModel.php';

class ModelList extends Model
{
    public function get_data()
    {
        $query = $this->db->query('SELECT * FROM Post');
        $data = $query->fetchAll();
        return $data;
    }
}