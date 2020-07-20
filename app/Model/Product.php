<?php

namespace App\Model;
use App\Model\Catagory;
use App\Model\unit;
use App\Model\Supplier;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function catagory(){
        return $this->belongsTo('App\Model\Catagory');
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public static $rules = [
        'name'=>'required', 'string', 'max:255',
        'price'=>'required',
        'quantity'=>'required',
        'catagory_id'=>'required',
        'unit_id'=>'required',
        'supplier_id'=>'required',
        
    ];
    
}
