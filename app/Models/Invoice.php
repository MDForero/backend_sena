<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'status',
        'address',
        'user_id',
        'order_id',
        'value'
    ];

    public function order() 
    {
        return $this->hasOne(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
