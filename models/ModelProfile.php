<?php

require_once './base/BaseModel.php';

class ModelProfile extends Model
{
    public function get_data()
    {
        return [
            1 => [
                'id'=>1,
                'name'=>"First",
                'surname' => 'Person'
            ],
            2 => [
                'id'=>2,
                'name'=>"Second",
                'surname' => 'Person'
            ],
            3 => [
                'id'=>3,
                'name'=>"Third",
                'surname' => 'Person'
            ],
            4 => [
                'id'=>4,
                'name'=>"Four",
                'surname' => 'Person'
            ],
        ];
    }
}