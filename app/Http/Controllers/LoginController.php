<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('login');
        }
    }
    public function actionlogin(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');

        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Failed!'
            ], 401);
        }
    }


    public function actionlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Use route helper with the named route
        return redirect()->route('login')->with('message', 'Successfully Logout!');
    }
}