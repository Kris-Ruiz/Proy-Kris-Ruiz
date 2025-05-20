<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Taller extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'estado', 'fecha_inicio', 'fecha_fin', 'instructor_id'
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function participantes()
    {
        return $this->hasMany(Participante::class);
    }

    public function materiales()
    {
        return $this->hasMany(Material::class);
    }
}
