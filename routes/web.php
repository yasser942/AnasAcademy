<?php

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UnitController;
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
    Route::prefix('curriculum')->controller(CurriculumController::class)->group(function () {
        Route::get('/', 'index')->name('curriculum.index');
        Route::get('/create', 'create')->name('curriculum.create');
        Route::get('/show/{id}', 'show')->name('curriculum.show');
        Route::post('/store', 'store')->name('curriculum.store');
        Route::get('/edit/{id}', 'edit')->name('curriculum.edit');
        Route::put('/update/{id}', 'update')->name('curriculum.update');
        Route::delete('/delete/{id}', 'destroy')->name('curriculum.delete');
    });
    Route::prefix('level')->controller(LevelController::class)->group(function () {
        Route::get('/', 'index')->name('level.index');
        Route::get('/create/{id}', 'create')->name('level.create');
        Route::get('/show/{id}', 'show')->name('level.show');
        Route::post('/store', 'store')->name('level.store');
        Route::get('/edit/{id}', 'edit')->name('level.edit');
        Route::put('/update/{id}', 'update')->name('level.update');
        Route::delete('/delete/{id}', 'destroy')->name('level.delete');
    });
    Route::prefix('unit')->controller(UnitController::class)->group(function () {
        Route::get('/', 'index')->name('unit.index');
        Route::get('/create/{id}', 'create')->name('unit.create');
        Route::get('/show/{id}', 'show')->name('unit.show');
        Route::post('/store', 'store')->name('unit.store');
        Route::get('/edit/{id}', 'edit')->name('unit.edit');
        Route::put('/update/{id}', 'update')->name('unit.update');
        Route::delete('/delete/{id}', 'destroy')->name('unit.delete');
    });
    Route::prefix('lesson')->controller(LessonController::class)->group(function () {
        Route::get('/', 'index')->name('lesson.index');
        Route::get('/create/{id}', 'create')->name('lesson.create');
        Route::get('/show/{id}', 'show')->name('lesson.show');
        Route::post('/store', 'store')->name('lesson.store');
        Route::get('/edit/{id}', 'edit')->name('lesson.edit');
        Route::put('/update/{id}', 'update')->name('lesson.update');
        Route::delete('/delete/{id}', 'destroy')->name('lesson.delete');
    });
});




