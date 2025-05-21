<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Taller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = Material::with('taller')->get();
        return view('materiales.index', compact('materiales'));
    }

    public function create()
    {
        $talleres = Taller::all();
        return view('materiales.create', compact('talleres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'taller_id' => 'required|exists:tallers,id'
        ]);

        Material::create($validated);
        return redirect()->route('materiales.index')->with('success', 'Material creado correctamente.');
    }

    public function show(Material $materiale)
    {
        $materiale->load('taller');
        return view('materiales.show', compact('materiale'));
    }

    public function edit(Material $materiale)
    {
        $talleres = Taller::all();
        return view('materiales.edit', compact('materiale', 'talleres'));
    }

    public function update(Request $request, Material $materiale)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'taller_id' => 'required|exists:tallers,id'
        ]);

        $materiale->update($validated);
        return redirect()->route('materiales.index')->with('success', 'Material actualizado correctamente.');
    }

    public function destroy(Material $materiale)
    {
        $materiale->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado correctamente.');
    }
}
