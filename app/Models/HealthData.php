<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;


class HealthData extends authenticatable
{
    public $table = 'health_data';
    protected  $fillable = [
        'user_id',
        'data',
        'type'
    ];

}
