<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'description',
        'value',
        'status',
        'address',
        'phone',
        'email',
        'nit',
        'order_id',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id', 'orders');
    }
    
}
