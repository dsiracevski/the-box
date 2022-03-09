<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SentenceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('goHome');

Route::controller(UserController::class)->group(function () {

    Route::get('register/', function () {
        return view('users.store');
    })->name('registerView');

    Route::get('/users/', 'index')->name('viewUsers')->middleware('auth');
    Route::get('/user/{user}', 'edit')->name('viewUser')->middleware('auth');
    Route::put('/user/{user}', 'update')->name('editUser')->middleware('auth');
    Route::post('/user/', 'create')->name('storeUser');
    Route::delete('/user/{user}/delete', 'destroy')->name('destroyUser')->middleware('auth');
});


Route::controller(AuthController::class)->group(function () {

    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('storeSession');
    Route::post('/logout', 'destroy')->name('destroySession')->middleware('auth');
});

Route::controller(SubjectController::class)->group(function () {

    Route::get('/subjects', 'index')->name('viewSubjects')->middleware('auth');
    Route::get('/subjects/new', 'create')->name('createSubject')->middleware('auth');
    Route::get('/subjects/{subject}', 'show')->name('viewSubject')->middleware('auth');
    Route::post('/subjects', 'store')->name('storeSubject')->middleware('auth');
    Route::put('/subjects/{subject}', 'edit')->name('editSubject')->middleware('auth');
    Route::delete('/subjects/{subject}', 'delete')->name('deleteSubject')->middleware('auth');


});

Route::controller(SentenceController::class)->group(function () {

    Route::get('/sentences', 'index')->name('viewSentences')->middleware('auth');
    Route::get('/sentences/{sentence}', 'view')->name('viewSentence')->middleware('auth');
    Route::post('/sentences', 'store')->name('storeSentence')->middleware('auth');
    Route::put('/sentences/{sentence}', 'edit')->name('editSentence')->middleware('auth');
    Route::delete('/sentences/{sentence}', 'delete')->name('deleteSentence')->middleware('auth');


});

Route::controller(ExerciseController::class)->group(function () {

    Route::get('/exercises', 'index')->name('viewExercises')->middleware('auth');
    Route::get('/exercises/{exercise}', 'show')->name('viewExercise')->middleware('auth');
    Route::post('/exercises', 'store')->name('storeExercise')->middleware('auth');
    Route::put('/exercises/{exercise}', 'edit')->name('editExercise')->middleware('auth');
    Route::delete('/exercises/{exercise}', 'delete')->name('deleteExercise')->middleware('auth');


});

Route::controller(GroupController::class)->middleware('auth')->group(function () {

    Route::get('/groups', 'index')->name('viewGroups');
    Route::get('/groups/{group}', 'show')->name('viewGroup');
    Route::get('/groups/{group}/subject', 'addSubject')->name('addSubject');
    Route::post('/groups/{group}/subject/', 'storeSubject')->name('storeSubject');
    Route::get('/groups/{group}/students/', 'viewStudents')->name('viewGroupStudents')  ;
    Route::get('/groups/{group}/subjects/', 'viewSubjects')->name('viewGroupSubjects');
    Route::get('/groups/{group}/teachers/', 'viewTeachers')->name('viewGroupTeachers');
    Route::post('/groups', 'store')->name('storeGroup')->middleware('auth');
    Route::put('/groups/{group}', 'edit')->name('editGroup');
    Route::delete('/groups/{group}', 'delete')->name('deleteGroup');


});

Route::controller(ActivityController::class)->group(function () {

    Route::get('/exercises/{exercise}/sentences', 'showSentences')->name('allSentences')->middleware('auth');
    Route::get('/exercises/{exercise}/candidates', 'showCandidates')->name('allCandidates')->middleware('auth');


});

