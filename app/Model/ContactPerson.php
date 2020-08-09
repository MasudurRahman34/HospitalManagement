<?php

namespace App\Model;
use App\Model\Supplier;

use Illuminate\Database\Eloquent\Model;

class contactPerson extends Model
{
    public function Supplier(){
            return $this->belongsTo(Supplier::class);  
    }
}
