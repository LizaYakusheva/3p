<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Application;
use App\Models\Event;
use App\Models\Review;
use App\Models\Teacher;
use App\Models\Type;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(Request $request)
    {
        return view('auth/login');
    }

    public function login(LoginRequest $request)
    {
        $successful = Auth::attempt([
           'phone' => $request->phone,
           'password' => $request->password
        ]);

        if (!$successful){
            return back()->withErrors(['login' => 'Неправильный логин или пароль']);
        }

        return redirect('/');
    }

    public function registerForm()
    {
        return view('auth/register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function cabinet()
    {
        $applications = Application::all();
        $events = Event::all();

        if (Auth::user()->is_admin){
            return view('auth/cabinetAdmin', [
                'applications' => $applications,
                'events' => $events,
            ]);
        }else{
            return view('auth/cabinet');
        }
    }
}
