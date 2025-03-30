<?php

use App\Http\Controllers\ExamenController;
use Illuminate\Support\Facades\Route;

Route::get('/{elements?}/{type?}', [ExamenController::class, 'index'])->where('elements', '[0-9]+')->name('home');
Route::get('/add', fn() => view('add'))->name('add');
Route::post('/store', [ExamenController::class, 'store'])->name('add.store');
Route::get('/examen/{id}', [ExamenController::class, 'show'])->name('show');
Route::post('/delete', [ExamenController::class, 'del'])->name("delete");
Route::post('/destroy/{id}', [ExamenController::class, 'destroy'])->name("delete.confirmed");
Route::post('/update/{id}', [ExamenController::class, 'update'])->name("update");
