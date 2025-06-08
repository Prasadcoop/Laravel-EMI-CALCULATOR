<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $request->validate([
                'username' => 'required',
                'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $userdata = User::where("name", $username)->first();

        if (!$userdata) {
             return redirect()->back()->withErrors(['Invalid username or password.'])->withInput();
        }

        // check username and password
        if (Hash::check($password, $userdata->password)) {
             Auth::login($userdata);
            return redirect()->route('tenures.index');
        } else {
           return redirect()->back()->with('error', 'Invalid username or password.');
        }
       
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
