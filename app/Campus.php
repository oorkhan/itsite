<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $guarded = [];

    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
}
