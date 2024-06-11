<?php

use App\Http\Controllers\RecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Authentication 
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Patient
Route::get('/fetchPatient', [UserController::class, 'fetchPatient']);
Route::get('/findPatient/{id}', [UserController::class, 'findPatient']);
Route::patch('/updatePatient/{id}', [UserController::class, 'updatePatient']);
Route::delete('/deletePatient/{id}', [UserController::class, 'destroyPatient']);

// Doctor
Route::get('/fetchDoctor', [UserController::class, 'fetchDoctor']);
Route::get('/findDoctor/{id}', [UserController::class, 'findDoctor']);
Route::patch('/updateDoctor/{id}', [UserController::class, 'updateDoctor']);
Route::delete('/deleteDoctor/{id}', [UserController::class, 'destroyDoctor']);

// Appointment
// Admin
Route::get('/fetchAppointments', [AppointmentController::class, 'fetchAll']);

// Doctor

// Patient


// Medical Record
// Admin
Route::get('/fetchRecords', [RecordController::class, 'fetchAll']);

// Doctor

// Patient

