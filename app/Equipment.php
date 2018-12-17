<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $guarded = [];
    public function equipmentType(){
        return $this->belongsTo(EquipmentType::class, 'EquipmentType_id');
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
     public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
