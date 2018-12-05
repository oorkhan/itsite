<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //mass assigment
    protected $guarded = [];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function room(){
        return $this->hasMany(Room::class);
    }
}
