<?php

use App\Http\Controllers\CurriculumController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('templates/main');
    })->name('dashboard');
});

Route::prefix('curriculum')->controller(CurriculumController::class)->group(function () {
    Route::get('/', 'index')->name('curriculum.index');
    Route::get('/create', 'create')->name('curriculum.create');
    Route::post('/store', 'store')->name('curriculum.store');
    Route::get('/edit/{id}', 'edit')->name('curriculum.edit');
    Route::post('/update/{id}', 'update')->name('curriculum.update');
    Route::delete('/delete/{id}', 'destroy')->name('curriculum.delete');
});


