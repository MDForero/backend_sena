<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['plates', 'status', 'user_id', 'table_id'];


    public function tables ()
    {
        return $this->belongsTo(Table::class, 'table_id', 'id', 'tables');
    }
    
    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }
    
}
