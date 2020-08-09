<?php

namespace App\Model;
use App\Model\Catagory;
use App\Model\unit;
use App\Model\Supplier;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\IdIncreamentable;
use DateTimeInterface;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes, IdIncreamentable;
    protected $dates=[
        'creadted_at',
        'updated_at',
        'deleted_at'
    ];
    public function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }

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
    public function IdIncreamentable(){
        return [
            'source'=>'id',
            'prefix'=>'pro-',
            'attribute'=>'product_gen_id',
        ];
    }
    
}
