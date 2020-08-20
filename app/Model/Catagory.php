<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Catagory extends Model
{
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
    ];
    public function catagories(){
    	return $this->hasMany(Catagory::class, 'parent_id');
    }
    public function childCatagories(){
    	return $this->hasMany(Catagory::class,'parent_id')->with('catagories');
    }
}
