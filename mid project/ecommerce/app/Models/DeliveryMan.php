<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    use HasFactory;
    protected $table = 'deliverymans';
    public function user()
    {
        
        return $this->belongsTo(Alluser::class,'userId');
    }
}
