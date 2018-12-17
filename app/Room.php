<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];
    public function campus(){
        return $this->belongsTo(Campus::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function employee(){
        return $this->hasMany(Employee::class);
    }
    public function equipments(){
        $this->hasMany(Equipment::class);
    }
}
