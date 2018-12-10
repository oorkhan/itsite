<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemUnit extends Model
{
     protected $guarded = [];

     public function equipment(){
         return $this->hasOne(Equipment::class);
     }
}
