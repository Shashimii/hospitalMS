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
// All
Route::get('/fetchAppointments/{id}', [AppointmentController::class, 'fetchOwn']);

// Admin
Route::get('/fetchAppointments', [AppointmentController::class, 'fetchAll']);

// Doctor
Route::get('/findAppointment/{id}', [AppointmentController::class, 'findAppointment']);

// Patient
Route::post('/newAppointment', [AppointmentController::class, 'storeAppointment']);
Route::delete('/deleteAppointment/{id}', [AppointmentController::class, 'destroyAppointment']);

// Medical Record
// Admin
Route::get('/fetchRecords', [RecordController::class, 'fetchAll']);

// Doctor
Route::post('/newRecord', [RecordController::class, 'storeRecord']);
Route::get('/findRecord/{id}', [RecordController::class, 'findRecord']);
Route::patch('/updateRecord/{id}', [RecordController::class, 'updateRecord']);

// Patient
Route::get('/fetchRecords/{id}', [RecordController::class, 'fetchOwn']);



