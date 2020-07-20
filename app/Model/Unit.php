<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public static $rules = [
        'name'=>'required', 'string', 'max:255',
    ];
}
