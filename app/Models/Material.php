<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_material', 'material_id', 'order_id');
    }

     
}
