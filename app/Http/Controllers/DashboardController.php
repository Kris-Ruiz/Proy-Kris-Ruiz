<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use App\Models\Participante;
use App\Models\Instructor;
use App\Models\Material;

class DashboardController extends Controller
{
    public function admin()
    {
        $talleresCount = Taller::count();
        $participantesCount = Participante::count();
        $instructoresCount = Instructor::count();
        $materialesCount = Material::count(); // Agregar conteo de materiales

        return view('dashboard-admin', compact('talleresCount', 'participantesCount', 'instructoresCount', 'materialesCount'));
    }

    public function user()
    {
        $misInscripcionesCount = Participante::where('user_id', auth()->id())->count();
        $talleresDisponiblesCount = Taller::whereDoesntHave('participantes', function ($query) {
            $query->where('user_id', auth()->id());
        })->count();

        return view('dashboard-user', compact('misInscripcionesCount', 'talleresDisponiblesCount'));
    }
}
