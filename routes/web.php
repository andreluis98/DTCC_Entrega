<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PetController::class, 'index']);
Route::get('/pets/create', [PetController::class, 'create'])->middleware('auth');
Route::get('/pets/{id}', [PetController::class, 'show']);
Route::post('/pets', [PetController::class, 'store']);
Route::delete('/pets/{id}', [PetController::class, 'destroy'])->middleware('auth');
Route::get('/pets/edit/{id}', [PetController::class, 'edit'])->middleware('auth');
Route::put('/pets/update/{id}', [PetController::class, 'update'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [PetController::class, 'dashboard'])->middleware('auth');


Route::post('/pets/join/{id}', [PetController::class, 'joinEvent'])->middleware('auth');

Route::delete('/pets/leave/{id}', [PetController::class, 'leaveEvent'])->middleware('auth');

