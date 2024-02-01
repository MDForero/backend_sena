<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'material_article');
    }
}
