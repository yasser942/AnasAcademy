<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PracticalExamController;
use App\Http\Controllers\PracticalTestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WordCategoryController;
use App\Livewire\QuestionCreator;
use App\Livewire\QuestionOptionManager;
use App\Models\PDF;
use App\Models\Test;
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
    return view('auth.signin');
});
Route::prefix('plan')->controller(PlanController::class)->group(function () {
    Route::get('/', 'index')->name('plan.index')->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'checkUserStatus',
    ]);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'checkUserStatus',
    'checkplan',


])->group(function () {


    Route::get('/dashboard', [AdminDashboardController::class ,'index'])->name('dashboard');

    Route::prefix('user')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('user.index');
        Route::delete('/delete/{id}', 'destroy')->name('user.delete');
        Route::get('user/toggleStatus/{id}/{action}', 'toggleStatus')->name('user.toggleStatus');
    });

    Route::prefix('plan')->controller(PlanController::class)->group(function () {
        Route::get('/create', 'create')->name('plan.create');
        Route::get('/show/{id}', 'show')->name('plan.show');
        Route::post('/store', 'store')->name('plan.store');
        Route::get('/edit/{id}', 'edit')->name('plan.edit');
        Route::put('/update/{id}', 'update')->name('plan.update');
        Route::delete('/delete/{id}', 'destroy')->name('plan.delete');
        Route::post('assign-plan/{planId}/{userId}', 'assignPlan')->name('plan.assign-plan');
    });


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

    Route::prefix('pdf')->controller(PDFController::class)->group(function () {
        Route::get('/', 'index')->name('pdf.index');
        Route::get('/create/{id}', 'create')->name('pdf.create');
        Route::get('/show/{id}', 'show')->name('pdf.show');
        Route::post('/store', 'store')->name('pdf.store');
        Route::get('/edit/{id}', 'edit')->name('pdf.edit');
        Route::put('/update/{id}', 'update')->name('pdf.update');
        Route::delete('/delete/{id}', 'destroy')->name('pdf.delete');
    });
    Route::prefix('video')->controller(VideoController::class)->group(function () {
        Route::get('/', 'index')->name('video.index');
        Route::get('/create/{id}', 'create')->name('video.create');
        Route::get('/show/{id}', 'show')->name('video.show');
        Route::post('/store', 'store')->name('video.store');
        Route::get('/edit/{id}', 'edit')->name('video.edit');
        Route::put('/update/{id}', 'update')->name('video.update');
        Route::delete('/delete/{id}', 'destroy')->name('video.delete');
    });

    Route::prefix('test')->controller(TestController::class)->group(function () {
        Route::get('/', 'index')->name('test.index');
        Route::get('/create/{id}', 'create')->name('test.create');
        Route::get('/show/{id}', 'show')->name('test.show');
        Route::post('/store', 'store')->name('test.store');
        Route::get('/edit/{id}', 'edit')->name('test.edit');
        Route::put('/update/{id}', 'update')->name('test.update');
        Route::delete('/delete/{id}', 'destroy')->name('test.delete');
    });

    Route::prefix('word-category')->controller(WordCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('word-category.index');
        Route::get('/create', 'create')->name('word-category.create');
        Route::get('/show/{id}', 'show')->name('word-category.show');
        Route::post('/store', 'store')->name('word-category.store');
        Route::get('/edit/{id}', 'edit')->name('word-category.edit');
        Route::put('/update/{id}', 'update')->name('word-category.update');
        Route::delete('/delete/{id}', 'destroy')->name('word-category.delete');
    });
    Route::prefix('card')->controller(CardController::class)->group(function () {
        Route::get('/', 'index')->name('card.index');
        Route::get('/create/{id}', 'create')->name('card.create');
        Route::get('/show/{id}', 'show')->name('card.show');
        Route::post('/store', 'store')->name('card.store');
        Route::get('/edit/{id}', 'edit')->name('card.edit');
        Route::put('/update/{id}', 'update')->name('card.update');
        Route::delete('/delete/{id}', 'destroy')->name('card.delete');
        Route::post('add-to-favorite/{id}', 'addToFavorite')->name('card.add-to-favorite');
        Route::post('delete-favorite/{id}', 'deleteFavorite')->name('card.delete-favorite');
        Route::get('favorite', 'favorite')->name('card.favorite');
    });

    Route::prefix('exam')->controller(ExamController::class)->group(function () {
        Route::get('/', 'index')->name('exam.index');
        Route::get('/create', 'create')->name('exam.create');
        Route::get('/show/{id}', 'show')->name('exam.show');
        Route::post('/store', 'store')->name('exam.store');
        Route::get('/edit/{id}', 'edit')->name('exam.edit');
        Route::put('/update/{id}', 'update')->name('exam.update');
        Route::delete('/delete/{id}', 'destroy')->name('exam.delete');
    });

    Route::prefix('notification')->controller(NotificationController::class)->group(function () {
        Route::get('/', 'index')->name('notification.index');
        Route::get('/create', 'create')->name('notification.create');
        Route::get('/show/{id}', 'show')->name('notification.show');
        Route::post('/store', 'store')->name('notification.store');
        Route::get('/edit/{id}', 'edit')->name('notification.edit');
        Route::put('/update/{id}', 'update')->name('notification.update');
        Route::delete('/delete/{id}', 'destroy')->name('notification.delete');
        Route::delete('/delete-all', 'destroyAll')->name('notification.delete-all');
    });

    Route::prefix('practical-test')->controller(PracticalTestController::class)->group(function () {
        Route::get('/', 'index')->name('practical-test.index');
        Route::get('/create/{id}', 'create')->name('practical-test.create');
        Route::get('/show/{id}', 'show')->name('practical-test.show');
        Route::post('/store', 'store')->name('practical-test.store');
        Route::get('/edit/{id}', 'edit')->name('practical-test.edit');
        Route::put('/update/{id}', 'update')->name('practical-test.update');
        Route::delete('/delete/{id}', 'destroy')->name('practical-test.delete');
    });

    Route::prefix('practical-exam')->controller(PracticalExamController::class)->group(function () {
        Route::get('/', 'index')->name('practical-exam.index');
        Route::get('/create', 'create')->name('practical-exam.create');
        Route::get('/show/{id}', 'show')->name('practical-exam.show');
        Route::post('/store', 'store')->name('practical-exam.store');
        Route::get('/edit/{id}', 'edit')->name('practical-exam.edit');
        Route::put('/update/{id}', 'update')->name('practical-exam.update');
        Route::delete('/delete/{id}', 'destroy')->name('practical-exam.delete');
    });
    Route::prefix('practical-card')->controller(\App\Http\Controllers\PracticalCardController::class)->group(function () {
        Route::get('/', 'index')->name('practical-card.index');
        Route::get('/create', 'create')->name('practical-card.create');
        Route::get('/show/{id}', 'show')->name('practical-card.show');
        Route::post('/store', 'store')->name('practical-card.store');
        Route::get('/edit/{id}', 'edit')->name('practical-card.edit');
        Route::put('/update/{id}', 'update')->name('practical-card.update');
        Route::delete('/delete/{id}', 'destroy')->name('practical-card.delete');

    });

    Route::get('exam-question/{id}',[ExamQuestionController::class,'create'])->name('exam-question.create');


    Route::get('question/{id}',[QuestionController::class,'create'])->name('question.create');




});




