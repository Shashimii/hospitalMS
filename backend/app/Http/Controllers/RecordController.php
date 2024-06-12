<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;
use Illuminate\Support\Facades\Validator;

class RecordController extends Controller
{
    
    public function fetchAll() {
        $records = Record::latest()->get();
        return response()->json($records);
    }

    public function fetchOwn($id)
    {
        $records = Record::where('patient_id', $id)->get();
        return response()->json($records);
    }
    
    public function findRecord($id) {
        $records = Record::find($id);
        if (!$records) {
            return response()->json(['error' => 'record not found'], 404);
        }
        return response()->json($records);
    }

    public function storeRecord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient' => 'required',
            'diagnosis' => 'required',
            'doctor' => 'required',
            'date' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $records = Record::create([
            'patient' => $request->patient,
            'diagnosis' => $request->diagnosis,
            'doctor' => $request->doctor,
            'date' => $request->date,
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id

        ]);

        return response()->json($records, 201);
    }

    public function updateRecord(Request $request, $id)
    {
        $records = Record::findOrFail($id);
    
        $records->diagnosis = $request->input('diagnosis');
        $records->date = $request->input('formatted');
    
        $records->save();
        return response()->json(['message' => 'record updated successfully'], 200);
    }    
}
