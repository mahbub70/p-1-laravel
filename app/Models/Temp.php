<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'data'  => 'object',
    ];


    public function scopeToken($query, $token) {
        return $query->where('token', $token);
    }
}
