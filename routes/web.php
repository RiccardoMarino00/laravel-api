<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController as PublicProjectController;
use App\Http\Controllers\Admin\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', PublicProjectController::class)->only(['index', 'show']);


Route::middleware(['auth', 'verified'])
  ->name('admin.')
  ->prefix('admin')
  ->group(function (){

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //Registro tutte le altre rotte protette
    //CRUD posts
    Route::resource('projects', ProjectController::class);

  });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
