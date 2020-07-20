<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public function parent(){
    	return $this->belongsTo(catagory::class, 'parent_id');
    }
}
