<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id',
        'products',
        'total',
    ];

    protected $casts = [
        'products' => 'array',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
