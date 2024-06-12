<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;


class AppointmentController extends Controller
{
    public function fetchAll() {
        $appointments = Appointment::latest()->get();
        return response()->json($appointments);
    }

    public function fetchOwn($id)
    {
        $appointments = Appointment::where('doctor_id', $id)->orWhere('patient_id', $id)->get();
        return response()->json($appointments);
    }

    
    public function findAppointment($id) {
        $appointments = Appointment::find($id);
        if (!$appointments) {
            return response()->json(['error' => 'appointment not found'], 404);
        }
        return response()->json($appointments);
    }

    public function storeAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'doctor' => 'required',
            'patient' => 'required',
            'schedule' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $appointment = Appointment::create([
            'name' => $request->name,
            'description' => $request->description,
            'doctor' => $request->doctor,
            'patient' => $request->patient,
            'schedule' => $request->schedule,
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id

        ]);

        return response()->json($appointment, 201);
    }

    public function destroyAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->delete();
        return response()->json(null, 204);
    }
}
