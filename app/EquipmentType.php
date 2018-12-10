<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    protected $guarded = [];

    public function addType($type){
        $this->create($type);
    }
}
