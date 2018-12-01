<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    public function department(){
        return $this->belongsTo(Department::class);
    }
     public function tasks(){
        return $this->hasMany(Task::class);
    }
}
