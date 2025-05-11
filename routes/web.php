<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Login\ProcesarOrden;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/procesar-orden', ProcesarOrden::class)->name('procesar');

require __DIR__.'/auth.php';
