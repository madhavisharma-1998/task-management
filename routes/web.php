<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(TaskController::class)->group(function () {
        Route::get('/tasks', 'index')->name('task.index');
        Route::get('/tasks/create', 'create')->name('task.create');
        Route::post('/tasks/store', 'store')->name('task.store');
        Route::get('/tasks/{task}/show', 'show')->name('task.show');
        Route::get('/tasks/{task}/edit', 'edit')->name('task.edit');
        Route::put('/tasks/{task}/update', 'update')->name('task.update');
        Route::delete('/tasks/{task}/destroy', 'destroy')->name('task.destroy');
        Route::get('tasks/archive', 'archive')->name('task.archive');
        Route::get('tasks/{task}/restore', 'restore')->name('task.restore');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categories', 'index')->name('category.index');
        Route::get('/categories/create', 'create')->name('category.create');
        Route::post('/categories/store', 'store')->name('category.store');
        Route::get('/categories/{category}/show', 'show')->name('category.show');
        Route::get('/categories/{category}/edit', 'edit')->name('category.edit');
        Route::put('/categories/{category}/update', 'update')->name('category.update');
        Route::delete('/categories/{category}/destroy', 'destroy')->name('category.destroy');
    });
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
