<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alluser;

class Customer extends Model
{
    use HasFactory;
   

    public function user()
    {
        //return $this->hasOne(Alluser::class,'id');
        return $this->belongsTo(Alluser::class,'userId');
    }
}
