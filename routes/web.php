<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('mis_asignaciones', 'mis_asignaciones')
    ->middleware(['auth', 'verified'])
    ->name('mis.asignaciones');

Route::view('panel_principal', 'panel_principal')
    ->middleware(['auth', 'verified'])
    ->name('panel.principal');

Route::get('tramites/{tramiteId}/ver'   , function ($tramiteId) {
    return view('ver-tramite', compact('tramiteId'));
})->middleware(['auth', 'verified'])->name('ver.tramite');

Route::get('tramites/{tramiteId}/atender', function ($tramiteId) {
    return view('atender-tramite', compact('tramiteId'));
})->middleware(['auth', 'verified'])->name('atender.tramite');

Route::get('tramites/{tramiteId}/derivar', function ($tramiteId) {
    return view('derivar-tramite', compact('tramiteId'));
})->middleware(['auth', 'verified'])->name('derivar.tramite');

Route::get('tramites/{tramiteId}/finalizar', function ($tramiteId) {
    return view('finalizar-tramite', compact('tramiteId'));
})->middleware(['auth', 'verified'])->name('finalizar.tramite');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
