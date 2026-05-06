<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Models\Career;


Route::get('/', function () {
    //2. Consultamos todas las carreras de la bd
    $careers = Career::all();

    //3. Retornamos la vista,pero  esta vez le adjuntamos la variable
    return view('register', compact('careers'));
});
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);