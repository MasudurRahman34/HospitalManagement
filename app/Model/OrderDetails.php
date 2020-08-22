<?php

namespace App\Model;
use App\Model\Supplier;
use App\Model\Product;
use App\Model\Order;
use App\Model\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;


class OrderDetails extends Model
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
    // public static $rules = [
    //     'name'=>'required', 'string', 'max:255',
    //     'catagory_id'=>'required',
    //     'supplier_id'=>'required',
    //     'unit_id'=>'required',
    //     'buying_price'=>'required',
    //     'selling_price'=>'required',
    // ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function order(){
        return $this->belongsTo(Unit::class,'order_id');
    }

}
