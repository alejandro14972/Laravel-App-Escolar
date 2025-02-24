<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Recurso extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'recursos';

    protected $fillable = [
        'recurso_nombre',
        'recurso_descripcion',
        'id_tematica',
        'privacidad',
        'user_id',
        'adjunto'
    ];

    protected $casts = [
        'adjunto' => 'array', // Convierte la columna JSON en un array automáticamente
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tematica()
    {
        return $this->belongsTo(Tematica::class, 'id_tematica');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //evitar duplicados de me gustas

    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function toSearchableArray()
    {
        return [
            //'id' => (int) $this->id,
            'recurso_nombre' => $this->recurso_nombre,
            'recurso_descripcion' => $this->recurso_descripcion,
        ];
    }
}
