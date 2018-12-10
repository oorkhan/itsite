<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $guarded = [];
    public function equipmentType(){
        return $this->belongsTo(EquipmentType::class);
    }
    public function systemUnit(){
        return $this->hasOne(SystemUnit::class);
    }
}
