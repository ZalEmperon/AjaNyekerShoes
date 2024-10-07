<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'phone_number' => 'required',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        return redirect('/login');
    }
}
