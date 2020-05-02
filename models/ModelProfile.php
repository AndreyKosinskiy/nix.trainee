<?php

require_once './base/BaseModel.php';

class ModelProfile extends Model
{
    public function get_data()
    {
        $query = $this->db->query('SELECT * FROM Profiel');
        $data = $query->fetchAll();
        return $data;
    }
    public function get_data_by_id($id =1)
    {
        $statement = $this->db->prepare('SELECT * FROM Profiel where id = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $data = $statement->fetchAll()[0];
        return $data;
    }
}