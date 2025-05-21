<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Taller extends Model
{
    use HasFactory;

    protected $table = 'tallers';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'cupo',
        'instructor_id'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    public function participantes()
    {
        return $this->hasMany(Participante::class);
    }

    public function estaInscrito($userId)
    {
        return $this->participantes()->where('user_id', $userId)->exists();
    }

    public function getInscritosCount()
    {
        return $this->participantes()->count();
    }
}
