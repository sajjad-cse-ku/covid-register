<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VaccineCenterController;
use App\Http\Controllers\VaccineRegisterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'dashboard');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('vaccine-center', [VaccineCenterController::class, 'vaccineCenter'])->name('vaccine.center');
Route::get('vaccine-register', [VaccineRegisterController::class, 'vaccineRegister'])->name('vaccine.register');
Route::post('vaccine-register-store', [VaccineRegisterController::class, 'vaccineRegisterStore'])->name('vaccine.register.store');
Route::get('vaccine-register-status', [VaccineRegisterController::class, 'vaccineRegisterStatus'])->name('vaccine.register.status');
Route::post('get-vaccine-register-status', [VaccineRegisterController::class, 'getVaccineRegisterStatus'])->name('get.vaccine.register.status');

//Route::post('test', function (\Illuminate\Http\Request $request) {
//    dd($request->all());
//})->name('test');
