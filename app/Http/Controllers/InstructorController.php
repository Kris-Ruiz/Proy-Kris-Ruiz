<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructores = Instructor::all();
        return view('instructores.index', compact('instructores'));
    }

    public function create()
    {
        return view('instructores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email',
        ]);

        Instructor::create($validated);

        return redirect()->route('instructores.index')->with('success', 'Instructor creado correctamente.');
    }

    public function show(Instructor $instructor)
    {
        return view('instructores.show', compact('instructor'));
    }

    public function edit(Instructor $instructor)
    {
        return view('instructores.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $instructor->id,
        ]);

        $instructor->update($validated);

        return redirect()->route('instructores.index')->with('success', 'Instructor actualizado correctamente.');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructores.index')->with('success', 'Instructor eliminado correctamente.');
    }
}
