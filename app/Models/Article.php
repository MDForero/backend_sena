<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'description',
        'value',
        'image',
        'category',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    
}
