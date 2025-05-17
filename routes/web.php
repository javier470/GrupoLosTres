<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Login\ProcesarOrden;
use App\Livewire\Login\DatosOrden;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/procesar-orden', ProcesarOrden::class)->name('procesar');

Route::get('/datos-orden', DatosOrden::class)->name('datos');

require __DIR__.'/auth.php';
