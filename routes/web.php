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
    Route::get('/user/{user}/view', 'show')->name('view-user')->middleware('auth');
    Route::put('/user/{user}', 'update')->name('editUser')->middleware('auth');
    Route::post('/user/', 'create')->name('storeUser');
    Route::delete('/user/{user}/delete', 'destroy')->name('destroyUser')->middleware('auth');
});


Route::controller(AuthController::class)->group(function () {

    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('storeSession');
    Route::post('/logout', 'destroy')->name('destroySession')->middleware('auth');
});

Route::controller(SubjectController::class)->middleware('auth')->group(function () {

    Route::get('/subjects', 'index')->name('viewSubjects');
    Route::get('/subjects/new', 'create')->name('create-subject');
    Route::get('/subjects/{subject}', 'show')->name('viewSubject');
    Route::post('/subjects', 'store')->name('store-subject');
    Route::put('/subjects/{subject}', 'edit')->name('editSubject');
    Route::delete('/subjects/{subject}', 'delete')->name('deleteSubject');

});

Route::controller(SentenceController::class)->middleware('auth')->group(function () {

    Route::get('/sentences', 'index')->name('show-sentences');
    Route::get('/sentences/new', 'create')->name('create-sentence');
    Route::get('/sentences/{sentence}', 'show')->name('view-sentence');
    Route::get('/sentences/{sentence}/edit', 'edit')->name('edit-sentence');
    Route::post('/sentences', 'store')->name('store-sentence');
    Route::put('/sentences/{sentence}', 'update')->name('update-sentence');
    Route::delete('/sentences/{sentence}', 'delete')->name('delete-sentence');


});

Route::controller(ExerciseController::class)->middleware('auth')->group(function () {

    Route::get('/exercises', 'index')->name('viewExercises');
    Route::get('/exercise/new', 'create')->name('create-exercise');
    Route::get('/exercises/{exercise}', 'show')->name('show-exercise');
    Route::post('/exercises', 'store')->name('store-exercise');
    Route::put('/exercises/{exercise}', 'edit')->name('editExercise');
    Route::delete('/exercises/{exercise}', 'delete')->name('deleteExercise');
    Route::get('/exercises/{exercise}/sentences', 'showSentences')->name('sentences-show');
    Route::get('/exercises/{exercise}/sentences/add', 'addSentences')->name('add-exercise-sentences');
    Route::post('/exercises/{exercise}/sentences/attach', 'attachSentences')->name('attach-sentences');
    Route::get('/exercises/{exercise}/sentence/{sentence}', 'editSentence')->name('edit-sentence');
    Route::get('/exercises/{exercise}/candidates', 'showCandidates')->name('candidates-show');

});

Route::controller(GroupController::class)->middleware('auth')->group(function () {

    Route::get('/groups', 'index')->name('viewGroups');
    Route::get('/groups/new', 'create')->name('createGroup');
    Route::get('/groups/{group}', 'show')->name('viewGroup');
    Route::get('/groups/{group}/subject', 'addGroupSubject')->name('add-group-subject');
    Route::get('/groups/{group}/teachers/', 'viewTeachers')->name('viewGroupTeachers');
    Route::get('/groups/{group}/subjects/', 'viewSubjects')->name('viewGroupSubjects');
    Route::get('/groups/{group}/students/', 'viewStudents')->name('viewGroupStudents');
    Route::get('/groups/{group}/students/add', 'addGroupStudent')->name('add-group-student');
    Route::post('/groups/{group}/students/store', 'storeGroupStudent')->name('store-group-student');
    Route::post('/groups/{group}/subject/', 'storeGroupSubject')->name('store-group-subject');
    Route::post('/groups', 'store')->name('storeGroup');
    Route::put('/groups/{group}', 'edit')->name('editGroup');
    Route::delete('/groups/{group}', 'delete')->name('deleteGroup');
    Route::delete('/groups/{group}/students/{studentId}', 'removeStudent')->name('remove-group-student');


});

Route::controller(ActivityController::class)->middleware('auth')->group(function () {


});

