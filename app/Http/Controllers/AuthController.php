<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login(){
		return view("login");
	}

	public function authenticate(Request $request): RedirectResponse
	{
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);

		$user 	= User::where("email",$request->input("email"))->first();

		if(!empty($user->role)){
			if (Auth::guard($user->role)->attempt($credentials)) {
				$request->session()->regenerate();
	
				return redirect()->intended('requests');
			}
		}


		return back()->withErrors([
			'email' => 'The provided credentials do not match our records.',
		])->onlyInput('email');
	}

	public function logout(Request $request): RedirectResponse
	{
		Auth::logout();
	 
		$request->session()->invalidate();
	 
		$request->session()->regenerateToken();
	 
		return redirect('/login');
	}
	
}
