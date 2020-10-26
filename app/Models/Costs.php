<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costs extends Model
{
    protected $fillable = [
        'type_id','amount','frequncy_id'
    ];

    public function freq(){
    
        return $this->belongsTo('App\Models\Frequincy','frequncy_id');
    
    }
    public function type(){
    
        return $this->belongsTo('App\Models\CostTypes','type_id');
    
    }

}
