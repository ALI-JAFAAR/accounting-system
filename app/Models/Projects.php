<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'name','details','price', 'customer_id','department_id','player_id','payment_id'
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    public function players(){
        return $this->belongsToMany('App\Models\Players','player_project');
    }

    public function department(){
        return $this->belongsTo('App\Models\Department','department_id');
    }
}
