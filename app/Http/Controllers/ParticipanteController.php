<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscripciones = Participante::with(['taller.instructor'])
            ->where('user_id', auth()->id())
            ->get();

        return view('participantes.index', compact('inscripciones'));
    }

    public function create() { /* ... */ }
    public function store(Request $request, Taller $taller)
    {
        // Verificar si ya está inscrito
        $yaInscrito = Participante::where('user_id', auth()->id())
            ->where('taller_id', $taller->id)
            ->exists();

        if ($yaInscrito) {
            return back()->with('error', 'Ya estás inscrito en este taller.');
        }

        // Verificar cupo disponible
        $inscritos = Participante::where('taller_id', $taller->id)->count();
        if ($inscritos >= $taller->cupo) {
            return back()->with('error', 'El taller ya no tiene cupos disponibles.');
        }

        // Crear inscripción
        Participante::create([
            'user_id' => auth()->id(),
            'taller_id' => $taller->id,
            'estado' => 'activo'
        ]);

        return redirect()->route('participantes.index')
            ->with('success', 'Te has inscrito correctamente al taller.');
    }
    public function show(Participante $participante) { /* ... */ }
    public function edit(Participante $participante) { /* ... */ }
    public function update(Request $request, Participante $participante) { /* ... */ }
    public function destroy(Participante $participante) { /* ... */ }
}
