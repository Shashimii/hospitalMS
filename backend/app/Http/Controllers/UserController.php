<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function fetchDoctor() {
        $users = User::where('role', '2')->latest()->get();
        return response()->json($users);
    }

    public function findDoctor($id) {
        $users = User::find($id);
        if (!$users) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($users);
    }

    public function updateDoctor(Request $request, $id)
    {
        $users = User::findOrFail($id);
    
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->contact = $request->input('contact');
        $users->profession = $request->input('profession');
        $users->password = bcrypt($request->input('password')); // Make sure to hash the password
    
        $users->save();
        return response()->json(['message' => 'User updated successfully'], 200);
    }    

    public function destroyDoctor($id){
        $users = User::find($id);
        $users->delete();
        return response()->json(null, 204);
    }


    public function fetchPatient() {
        $users = User::where('role', '3')->latest()->get();
        return response()->json($users);
    }

    public function findPatient($id) {
        $users = User::find($id);
        if (!$users) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($users);
    }

    public function updatePatient(Request $request, $id)
    {
        $users = User::findOrFail($id);
    
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->contact = $request->input('contact');
        $users->password = bcrypt($request->input('password')); // Make sure to hash the password
    
        $users->save();
        return response()->json(['message' => 'User updated successfully'], 200);
    }    

    public function destroyPatient($id){
        $users = User::find($id);
        $users->delete();
        return response()->json(null, 204);
    }
}
