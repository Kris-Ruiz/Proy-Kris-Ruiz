<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'taller_id'
    ];

    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }
}
