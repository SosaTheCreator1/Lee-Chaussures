<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
{
    $attributes = request()->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($attributes)) {
        session()->regenerate();

        // Redirección basada en el rol del usuario
        $user = Auth::user(); // Obtiene el usuario autenticado
        switch ($user->userType) {
            case 'Administrador':
                return redirect('/admin/tables')->with(['success' => 'Welcome, Admin!']);
            case 'Cliente':
                return redirect('/cliente/dashboard')->with(['success' => 'Welcome, Client!']);
            case 'Trabajador':
                return redirect('/trabajador/dashboard')->with(['success' => 'Welcome, Worker!']);
            default:
                return redirect('/dashboard')->with(['success' => 'You are logged in.']);
        }
    } else {
        return back()->withErrors(['email' => 'Email or password invalid.']);
    }
}

    
    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
