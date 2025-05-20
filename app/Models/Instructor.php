<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'email', 'telefono'
    ];

    public function talleres()
    {
        return $this->hasMany(Taller::class);
    }
}
