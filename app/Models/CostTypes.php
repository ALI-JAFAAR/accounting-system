<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostTypes extends Model
{
    protected $fillable = [
        'name'
    ];

    public function cost(){
        
        return $this->hasOne('App\Models\Costs');
        
    }
}
