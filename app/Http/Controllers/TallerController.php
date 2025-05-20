<?php

namespace App\Http\Controllers;

use App\Models\Taller;
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

    public function create()
    {
        // Lógica para mostrar formulario de creación
    }

    public function store(Request $request)
    {
        // Lógica para guardar un nuevo taller
    }

    public function show(Taller $taller)
    {
        // Lógica para mostrar detalles de un taller
    }

    public function edit(Taller $taller)
    {
        // Lógica para mostrar formulario de edición
    }

    public function update(Request $request, Taller $taller)
    {
        // Lógica para actualizar un taller
    }

    public function destroy(Taller $taller)
    {
        // Lógica para eliminar un taller
    }
}
