<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SeniorFamily extends Authenticatable
{
    public $table = 'senior_family';
    protected  $fillable = [
        'senior_email',
        'user_id'
    ];

}
