<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',auth()->user()->id)->get();
        return view('admin.users', compact('users'));
    }

    public function createUser(Request $request)
    {
        // Validate inputs as needed...
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'isAdmin' => $request->role === 'admin',
            'isDoctor' => $request->role === 'doctor',
            'isNurse' => $request->role === 'nurse',
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.users')->with('message','User created successfully');
    }
}