<?php

namespace App\Mail;

use App\Models\Taller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TallerInscripcionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $taller;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct(Taller $taller, $user)
    {
        $this->taller = $taller;
        $this->user = $user;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Preparar los datos para el PDF de la misma manera que en el controlador
        $data = [
            'titulo' => 'Comprobante de Inscripción',
            'nombre_taller' => $this->taller->nombre,
            'descripcion' => $this->taller->descripcion,
            'fecha_inicio' => $this->taller->fecha_inicio->format('d/m/Y'),
            'fecha_fin' => $this->taller->fecha_fin->format('d/m/Y'),
            'instructor' => $this->taller->instructor->nombre,
            'participante' => $this->user->name,
            'fecha_inscripcion' => now()->format('d/m/Y')
        ];

        $pdf = PDF::loadView('pdfs.taller-inscripcion', $data);

        return $this->subject('Confirmación de Inscripción')
                    ->view('emails.taller-inscripcion')
                    ->attachData($pdf->output(), 'inscripcion-taller.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
