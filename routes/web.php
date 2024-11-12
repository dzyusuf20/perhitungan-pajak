<?php

use App\Http\Controllers\PenghasilanController;

Route::get('/form', [PenghasilanController::class, 'showForm']);
Route::post('/hitung', [PenghasilanController::class, 'hitungPPh']);
