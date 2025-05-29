<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use App\Models\Instructor;
use App\Models\Participante;
use App\Mail\TallerInscripcionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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

        // Enviar correo con PDF adjunto
        Mail::to(auth()->user()->email)->send(new TallerInscripcionMail($tallere, auth()->user()));

        return redirect()->route('talleres.index')
            ->with('success', 'Te has inscrito correctamente al taller. Revisa tu correo para más detalles.');
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

    public function descargarPdf(Taller $tallere)
    {
        try {
            // Forzar la carga de las relaciones necesarias
            $taller = Taller::with(['instructor'])->findOrFail($tallere->id);
            
            // Datos simplificados y seguros para el PDF
            $data = [
                'titulo' => 'Comprobante de Inscripción',
                'nombre_taller' => $taller->nombre,
                'descripcion' => $taller->descripcion,
                'fecha_inicio' => $taller->fecha_inicio->format('d/m/Y'),
                'fecha_fin' => $taller->fecha_fin->format('d/m/Y'),
                'instructor' => $taller->instructor->nombre,
                'participante' => auth()->user()->name,
                'fecha_inscripcion' => now()->format('d/m/Y')
            ];

            $pdf = PDF::loadView('pdfs.taller-inscripcion', $data);
            
            return $pdf->download('inscripcion-taller.pdf');
            
        } catch (\Exception $e) {
            \Log::error('Error generando PDF: ' . $e->getMessage());
            return back()->with('error', 'Error generando el PDF: ' . $e->getMessage());
        }
    }

    public function testPdf()
    {
        $data = [
            'titulo' => 'PDF de Prueba',
            'contenido' => 'Este es un PDF de prueba generado con DomPDF',
            'fecha' => now()->format('d/m/Y H:i:s')
        ];

        $pdf = PDF::loadView('pdfs.test', $data);
        
        return $pdf->download('prueba.pdf');
    }

    public function testTallerPdf()
    {
        // Obtener el primer taller como ejemplo
        $taller = Taller::with('instructor')->first();
        
        if (!$taller) {
            return back()->with('error', 'No hay talleres disponibles para probar');
        }

        $data = [
            'taller' => $taller,
            'user' => auth()->user()
        ];

        $pdf = PDF::loadView('pdfs.taller-inscripcion', $data);
        
        return $pdf->download('taller-prueba.pdf');
    }
}
