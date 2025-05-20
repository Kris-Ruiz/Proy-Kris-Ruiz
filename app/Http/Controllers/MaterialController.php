<?php

namespace App\Http\Controllers;

use App\Models\Material;
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

    public function create() { /* ... */ }
    public function store(Request $request) { /* ... */ }
    public function show(Material $material) { /* ... */ }
    public function edit(Material $material) { /* ... */ }
    public function update(Request $request, Material $material) { /* ... */ }
    public function destroy(Material $material) { /* ... */ }
}
