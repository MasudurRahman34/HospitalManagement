<?php

namespace App\Model;
use App\Model\contactPerson;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\IdIncreamentable;
use DateTimeInterface;

class Supplier extends Model
{
    use SoftDeletes, IdIncreamentable;
    protected $dates=[
        'creadted_at',
        'updated_at',
        'deleted_at'
    ];
    // public static $fillable=[

    // ];
    public function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }
    public static $rules = [
        'official_name'=>'required', 'string', 'max:255',
        'official_address'=>'string',
    ];
    //bootable
    public function IdIncreamentable(){
        return [
            'source'=>'id',
            'prefix'=>'sup-',
            'attribute'=>'supplier_gen_id',
        ];
    }
    public function contactPerson(){
        return $this->hasMany(contactPerson::class,'type_id','id')->where('type','supplier');
    }
}
