<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ParticipanteAdminController;
use App\Http\Middleware\AdminMiddleware;
use Livewire\Volt\Volt;

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
    Route::get('mis-inscripciones', [ParticipanteController::class, 'index'])->name('participantes.index');
});

require __DIR__.'/auth.php';
