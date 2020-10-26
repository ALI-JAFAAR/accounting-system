<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPrice extends Model
{
    protected $fillable = [
        'project_id','value'
    ];
}
