<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function fetchAll() {
        $appointments = Appointment::latest()->get();
        return response()->json($appointments);
    }
}
