<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable = [
        'name',
        'quantity',
    ];

    public function articles():BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
