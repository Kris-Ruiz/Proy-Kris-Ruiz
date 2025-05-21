<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteAdminController extends Controller
{
    public function index()
    {
        $participantes = Participante::with(['user', 'taller'])->get();
        return view('participantes-admin.index', compact('participantes'));
    }

    public function show(Participante $participanteAdmin)
    {
        $participanteAdmin->load(['user', 'taller']);
        return view('participantes-admin.show', compact('participanteAdmin'));
    }

    public function edit(Participante $participanteAdmin)
    {
        $participanteAdmin->load(['user', 'taller']);
        return view('participantes-admin.edit', compact('participanteAdmin'));
    }

    public function update(Request $request, Participante $participanteAdmin)
    {
        $validated = $request->validate([
            'estado' => 'required|in:activo,inactivo'
        ]);

        $participanteAdmin->update($validated);
        return redirect()->route('participantes.admin.index')->with('success', 'Estado del participante actualizado.');
    }

    public function destroy(Participante $participanteAdmin)
    {
        $participanteAdmin->delete();
        return redirect()->route('participantes.admin.index')->with('success', 'Participante eliminado correctamente.');
    }
}
