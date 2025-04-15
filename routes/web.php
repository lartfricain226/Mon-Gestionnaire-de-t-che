<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[TaskController::class,'index'])->name('index');

// Route::get('/tasks/créer-une-tache', [TaskController::class, 'create'])->name('create');

// Route::post('/tasks/créer-une-tache', [TaskController::class, 'store'])->name('store');

// Route::get('/tasks/modifier-la-tache-{id}', [TaskController::class, 'edit'])->name('edit');

// Route::put('/tasks/modifier-la-tache-{id}', [TaskController::class, 'update'])->name('update');

// Route::delete('/tasks/supprimer-la-tache-{id}', [TaskController::class, 'destroy'])->name('destroy');
Route::middleware('auth')->group(function () {
    
Route::Resource('/tasks',TaskController::class);
Route::get('/Vos-tâches-supprimées', [TaskController::class, 'tasksTrashed'])->name('tasksTrashed');

Route::put('/tasks/{id}/restaurer', [TaskController::class, 'restore'])->name('restore');

Route::delete('/tasks/{id}/supprimer-définitivement', [TaskController::class, 'forceDelete'])->name('forceDelete');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::get('/',[AuthController::class,'login'])->name('login');

Route::post('/',[AuthController::class,'store'])->name('store');

Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/register',[AuthController::class,'storeRegister'])->name('storeRegister');
