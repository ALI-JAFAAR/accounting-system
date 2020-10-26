<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model{
    
    protected $fillable = [
        'value','player_id'
    ];

    public function player(){
        return $this->belongsTo('App\Models\Players','player_id');   
    }
}
