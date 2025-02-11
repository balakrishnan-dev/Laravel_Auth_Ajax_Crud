<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/dashboard', [StudentController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Show all students (Dashboard)
Route::get('/students', [StudentController::class, 'index'])->name('students.index');  // Display all students

// Show the add student form
Route::get('/students/add', [StudentController::class, 'create'])->name('students.create');  // Form for adding student

// Store the new student data
Route::post('/students', [StudentController::class, 'store'])->name('students.store');  // Store student

// Show the edit student form
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');

// Update the student data
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

// Delete a student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');  // Delete student

// Show the student dashboard page (All students)
Route::get('/dashboard', [StudentController::class, 'index'])->name('students.dashboard');  // Dashboard (List of all students)
