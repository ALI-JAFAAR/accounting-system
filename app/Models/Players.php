<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Players extends Model{
    
    protected $fillable = ['name','department_id','position'];
    
    public function department(){
    
        return $this->belongsTo('App\Models\Department','department_id');   
    
    }
    
    public function salary(){
    
        return $this->hasOne('App\Models\Salary');   
    
    }
}
