<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participantes = Participante::with(['user', 'taller'])->get();
        return view('participantes.index', compact('participantes'));
    }

    public function create() { /* ... */ }
    public function store(Request $request) { /* ... */ }
    public function show(Participante $participante) { /* ... */ }
    public function edit(Participante $participante) { /* ... */ }
    public function update(Request $request, Participante $participante) { /* ... */ }
    public function destroy(Participante $participante) { /* ... */ }
}
