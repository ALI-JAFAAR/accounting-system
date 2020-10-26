<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','address','work_type', 'email','phone'
    ];

    public function proj(){
    
        return $this->hasOne('App\Models\Projects');
    
    }
}
