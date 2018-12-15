<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $guarded = [];

    protected $dispachesEvent = [
        'created' => ProjectCreated::class,
    ];

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function addJob($job){
        $this->jobs()->create($job);
    }
    public function owner(){
        return $this->belongsTo(User::class);
    }
}
