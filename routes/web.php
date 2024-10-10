<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VaccineCenterController;
use App\Http\Controllers\VaccineRegisterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'dashboard');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('vaccine-center', [VaccineCenterController::class, 'vaccineCenter'])->name('vaccine.center');
Route::get('vaccine-register', [VaccineRegisterController::class, 'vaccineRegister'])->name('vaccine.register');

Route::post('test', function (\Illuminate\Http\Request $request) {
    dd($request->all());
})->name('test');
