<?php

namespace App\Model;
use App\Model\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\IdIncreamentable;
use DateTimeInterface;
class Order extends Model
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
    public static $rules = [
        'sub_total'=>'numeric | min:1',
        'discount'=>'numeric',
        'total_payable'=>'numeric |min:0',
        'paid_amount'=>'numeric |min:0',
        'due_amount'=>'numeric |min:0',
        'supplier_id'=>'numeric |min:0',
    ];
    public function IdIncreamentable(){
        return [
            'source'=>'id',
            'prefix'=>'INV-',
            'attribute'=>'Invoice_id',
        ];
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
