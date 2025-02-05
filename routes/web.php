<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\DoctorController;

Route::get('/', function () {
    if (Auth::check()) {
        // If the user is logged in, redirect according to role (or pick a default)
        if (Auth::user()->isAdmin) {
            return redirect()->route('admin.users');
        } elseif (Auth::user()->isNurse) {
            return redirect()->route('nurse.patients');
        } elseif (Auth::user()->isDoctor) {
            return redirect()->route('doctor.patients');
        } else {
            // If no specific role is found, redirect to a default route or show an error
            return redirect()->route('login');
        }
    } else {
        // If not logged in, always go to login
        return redirect()->route('login');
    }
})->name('home');

// Auth routes
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.post');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

// Admin routes
Route::middleware(['auth','checkrole:admin'])->group(function(){
    Route::get('/admin/users',[AdminController::class,'index'])->name('admin.users');
    Route::post('/admin/users',[AdminController::class,'createUser'])->name('admin.users.create');
});

// Nurse routes
Route::middleware(['auth','checkrole:nurse'])->group(function(){
    Route::get('/nurse/patients',[NurseController::class,'index'])->name('nurse.patients');
    Route::post('/nurse/patients',[NurseController::class,'store'])->name('nurse.patients.store');
    Route::get('/nurse/patients/{id}/edit',[NurseController::class,'edit'])->name('nurse.patients.edit');
    Route::post('/nurse/patients/{id}/update',[NurseController::class,'update'])->name('nurse.patients.update');
    Route::delete('/nurse/patients/{id}',[NurseController::class,'destroy'])->name('nurse.patients.delete');
});

// Doctor routes
Route::middleware(['auth','checkrole:doctor'])->group(function(){
    Route::get('/doctor/patients',[DoctorController::class,'index'])->name('doctor.patients');
    Route::get('/doctor/patients/{id}/edit',[DoctorController::class,'edit'])->name('doctor.patients.edit');
    Route::post('/doctor/patients/{id}/update',[DoctorController::class,'update'])->name('doctor.patients.update');
    Route::delete('/doctor/patients/{id}',[DoctorController::class,'destroy'])->name('doctor.patients.delete');
});