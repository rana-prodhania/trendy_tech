<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function dashboard()
    {
        // return view('admin.dashboard');
        return view('admin.dashboard');
    }
    public function store(Request $request)
    {
        // Admin Login
        $email = $request->email;
        $password = $request->password;

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back();
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
