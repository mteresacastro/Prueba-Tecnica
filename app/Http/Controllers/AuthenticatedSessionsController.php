<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionsController extends Controller
{
    public function store(Request $request){

        $credentials = $request->validate([
            'email' =>['required','string','email'],
            'password' =>['required','string'],
        ]);

        if(! Auth::attempt($credentials, $request->boolean('remember'))){

            throw ValidationException::withMessages([
                'email'=> __('auth.failed')
            ]);
        } //attempt como segundo parametro recibe un booleano, si quiere recordar o no. Devuelve un booleano

        $request->session()->regenerate();

        return redirect()->intended()->with('status', 'Has iniciado sesión correctamente');
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status', 'Has cerrado sesión. ¡Hasta pronto!');
    }

}
