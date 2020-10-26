<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $fillable = [
        'player_id','project_id','department_id'
    ];

    public function player(){
        
        return $this->belongsTo('App\Models\Players','player_id');
        
    }

    public function project(){
    
        return $this->hasOne('App\Models\Projects');
    
    }
}
