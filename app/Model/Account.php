<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Account extends Model
{
    use SoftDeletes;
    protected $dates=[
        'creadted_at',
        'updated_at',
        'deleted_at'
    ];
    public function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }
    public static $rules = [
        'name'=>'required', 'string', 'max:255',
        'account_name'=>'string',
        'account_number'=>'string',
    ];
}
