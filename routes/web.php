<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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
    return view('auth/login');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/my', [ClassroomController::class, 'index'])->name('project.classroom.index');

    Route::get('/subjects', [SubjectController::class, 'index'])->name('project.subject.index');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('project.subject.create');
    Route::post('/subjects/registra', [SubjectController::class, 'store'])->name('project.subject.store');
    Route::get('/subjects/edit/{id}', [SubjectController::class, 'edit'])->name('project.subject.edit');
    Route::put('/subjects/update/{id}', [SubjectController::class, 'update'])->name('project.subject.update');
    Route::delete('/subjects/delete/{id}', [SubjectController::class, 'destroy'])->name('project.subject.destroy');

    Route::get('/teachers', [TeacherController::class, 'index'])->name('project.teacher.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('project.teacher.create');
    Route::post('/teachers/registra', [TeacherController::class, 'store'])->name('project.teacher.store');
    Route::get('/teachers/edit/{id}', [TeacherController::class, 'edit'])->name('project.teacher.edit');
    Route::put('/teachers/update/{id}', [TeacherController::class, 'update'])->name('project.teacher.update');
    Route::delete('/teachers/delete/{id}', [TeacherController::class, 'destroy'])->name('project.teacher.destroy');
    Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('project.teacher.show');

    Route::get('/classrooms', [classroomController::class, 'listaaula'])->name('project.classroom.list');
    Route::get('/classrooms/create', [classroomController::class, 'create'])->name('project.classroom.create');
    Route::post('/classrooms/registra', [classroomController::class, 'store'])->name('project.classroom.store');
    Route::get('/classrooms/edit/{id}', [classroomController::class, 'edit'])->name('project.classroom.edit');
    Route::put('/classrooms/update/{id}', [classroomController::class, 'update'])->name('project.classroom.update');
    Route::delete('/classrooms/delete/{id}', [classroomController::class, 'destroy'])->name('project.classroom.destroy');
    Route::get('/classrooms/{id}', [classroomController::class, 'show'])->name('project.classroom.show');


    Route::get('/alumnos', [StudentController::class, 'index'])->name('project.student.index');
});
