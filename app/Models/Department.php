<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model{
	
    protected $fillable = [
        'name','details'
    ];

    public function player(){
        return $this->hasOne('App\Models\Players');
    }

    public function depts(){
        return $this->hasOne('App\Models\Projects');
    }
}
