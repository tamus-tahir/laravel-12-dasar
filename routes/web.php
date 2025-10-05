<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');

Route::get('/student', function () {
    return view('student.index', ['title' => 'Student Page']);
});
