<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'recurso_id'
    ];

    public function recurso()
    {
        return $this->belongsTo(Recurso::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
