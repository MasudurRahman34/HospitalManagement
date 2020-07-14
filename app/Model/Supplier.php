<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public static $rules = [
        'name'=>'required', 'string', 'max:255',
        'address'=>'required', 'string',
    ];
}
