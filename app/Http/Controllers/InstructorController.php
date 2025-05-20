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

    public function create() { /* ... */ }
    public function store(Request $request) { /* ... */ }
    public function show(Instructor $instructor) { /* ... */ }
    public function edit(Instructor $instructor) { /* ... */ }
    public function update(Request $request, Instructor $instructor) { /* ... */ }
    public function destroy(Instructor $instructor) { /* ... */ }
}
