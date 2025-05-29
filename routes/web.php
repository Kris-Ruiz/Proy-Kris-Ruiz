<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ParticipanteAdminController;
use App\Http\Middleware\AdminMiddleware;
use Livewire\Volt\Volt;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas solo para admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('talleres', TallerController::class);
    Route::resource('instructores', InstructorController::class)->parameters([
        'instructores' => 'instructor'
    ]);
    Route::resource('materiales', MaterialController::class);
    Route::resource('participantes-admin', ParticipanteAdminController::class)->parameters([
        'participantes-admin' => 'participanteAdmin'
    ])->names([
        'index' => 'participantes.admin.index',
        'show' => 'participantes.admin.show',
        'edit' => 'participantes.admin.edit',
        'update' => 'participantes.admin.update',
        'destroy' => 'participantes.admin.destroy',
    ]);

    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
});

// Rutas para usuarios autenticados (usuarios normales)
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Rutas para ver talleres e inscribirse (usuarios normales)
    Route::resource('talleres', TallerController::class)->only(['index', 'show']);
    Route::post('talleres/{tallere}/inscribirse', [TallerController::class, 'inscribirse'])->name('talleres.inscribirse');
    Route::delete('talleres/{tallere}/desinscribirse', [TallerController::class, 'desinscribirse'])->name('talleres.desinscribirse');
    Route::get('mis-inscripciones', [ParticipanteController::class, 'index'])->name('participantes.inscripciones');
    Route::get('talleres/{tallere}/descargar-pdf', [TallerController::class, 'descargarPdf'])
        ->name('talleres.descargar-pdf');

    // Ruta de prueba para PDF
    Route::get('/test-pdf', [TallerController::class, 'testPdf'])->name('test.pdf');

    // Ruta de prueba para PDF de taller específico
    Route::get('/test-taller-pdf', [TallerController::class, 'testTallerPdf'])->name('test.taller.pdf');

    Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('dashboard.user');
});

require __DIR__.'/auth.php';
