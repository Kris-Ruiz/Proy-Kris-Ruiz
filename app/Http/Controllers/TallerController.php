<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use App\Models\Instructor;
use App\Models\Participante;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talleres = Taller::with('instructor')->get();
        return view('talleres.index', compact('talleres'));
    }

    public function create(Taller $taller)
    {
        $instructores = Instructor::all();
        return view('talleres.create', compact('instructores'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'cupo' => 'required|integer|min:1',
            'instructor_id' => 'required|exists:instructors,id'
        ]);

        Taller::create($validated);
        return redirect()->route('talleres.index')->with('success', 'Taller creado correctamente.');
    }

    public function show(Taller $tallere)
    {
        $tallere->load('instructor');
        return view('talleres.show', compact('tallere'));
    }

    public function edit(Taller $tallere)
    {
        $instructores = Instructor::all();
        return view('talleres.edit', compact('tallere', 'instructores'));
    }

    public function update(Request $request, Taller $tallere)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'cupo' => 'required|integer|min:1',
            'instructor_id' => 'required|exists:instructors,id'
        ]);

        $tallere->update($validated);
        return redirect()->route('talleres.index')->with('success', 'Taller actualizado correctamente.');
    }

    public function inscribirse(Taller $tallere)
    {
        // Verificar si ya está inscrito
        $yaInscrito = Participante::where('user_id', auth()->id())
            ->where('taller_id', $tallere->id)
            ->exists();

        if ($yaInscrito) {
            return back()->with('error', 'Ya estás inscrito en este taller.');
        }

        // Verificar cupo disponible
        $inscritos = Participante::where('taller_id', $tallere->id)->count();
        if ($inscritos >= $tallere->cupo) {
            return back()->with('error', 'El taller ya no tiene cupos disponibles.');
        }

        // Crear inscripción
        Participante::create([
            'user_id' => auth()->id(),
            'taller_id' => $tallere->id,
            'estado' => 'activo'
        ]);

        return redirect()->route('talleres.index')
            ->with('success', 'Te has inscrito correctamente al taller.');
    }

    public function desinscribirse(Taller $tallere)
    {
        Participante::where('user_id', auth()->id())
            ->where('taller_id', $tallere->id)
            ->delete();

        return back()->with('success', 'Te has desinscrito del taller correctamente.');
    }

    public function destroy(Taller $taller)
    {
        $taller->delete();
        return redirect()->route('talleres.index')->with('success', 'Taller eliminado correctamente.');
    }    
}
