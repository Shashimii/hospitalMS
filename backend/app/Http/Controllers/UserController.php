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

    public function fetchPatient() {
        $users = User::where('role', '3')->latest()->get();
        return response()->json($users);
    }
}
