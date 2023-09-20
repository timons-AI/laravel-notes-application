<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'login_email' => ['required', 'email'],
            'login_password' => ['required', 'min:3', 'max:20'],
        ]);
        if (auth()->attempt(['email' => $incomingFields['login_email'], 'password' => $incomingFields['login_password']])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect('/')->withErrors(['login_email' => 'Invalid credentials']);
        
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:20'],
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
