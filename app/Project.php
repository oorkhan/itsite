<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function addJob($job){
        $this->jobs()->create($job);
    }
}
